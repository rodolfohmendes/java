from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
import asyncpg
import os

app = FastAPI()

class LoginData(BaseModel):
    username: str
    password: str

@app.on_event("startup")
async def startup():
    app.state.db = await asyncpg.connect(
        user=os.getenv("DB_USER"),
        password=os.getenv("DB_PASSWORD"),
        database=os.getenv("DB_NAME"),
        host=os.getenv("DB_HOST")
    )

@app.on_event("shutdown")
async def shutdown():
    await app.state.db.close()

@app.post("/login")
async def login(data: LoginData):
    user = await app.state.db.fetchrow(
        "SELECT * FROM users WHERE username=$1 AND password=$2",
        data.username, data.password
    )
    if user:
        return {"status": "success", "message": f"Welcome {data.username}!"}
    else:
        raise HTTPException(status_code=401, detail="Invalid credentials")
