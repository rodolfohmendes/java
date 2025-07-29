CREATE TABLE IF NOT EXISTS users (
  id SERIAL PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
);

DO $$
BEGIN
  FOR i IN 1..200 LOOP
    INSERT INTO users (username, password) VALUES (
      'user' || i, 'pass' || i
    );
  END LOOP;
END
$$;
