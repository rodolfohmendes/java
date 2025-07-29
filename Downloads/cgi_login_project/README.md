# CGI Login Project

This project contains a Python CGI login form embedded in `login.html`, ready to run inside a Docker container.

## How to Build and Run

```bash
docker build -t cgi-login-app .
docker run -d -p 8080:80 --name cgi-login cgi-login-app
```

Access the application at [http://localhost:8080/login.html](http://localhost:8080/login.html).
