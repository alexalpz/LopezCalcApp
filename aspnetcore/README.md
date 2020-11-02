# IO.Swagger - ASP.NET Core 2.0 Server

Simple calculator API. To authorize, add the following in headers `Authorization:Basic VIP_Ticket`

## Run

Linux/OS X:

```
sh build.sh
```

Windows:

```
build.bat
```

## Run in Docker

```
cd src/IO.Swagger
docker build -t io.swagger .
docker run -p 5000:5000 io.swagger
```
