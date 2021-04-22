## Simple stress test

This [image](https://hub.docker.com/r/leonardolemos/http-stress) is meant for a simple HTTP stress test, built in PHP, useful for autoscaling tests.

**IMPORTANT: This image is not production ready**

### Running the container

Use this command to run the container:

```sh
docker run -p 8000:8000 leonardolemos/http-stress
```

The service will be accessible in `localhost:8000`

### Get general information from server

Reaching the port 8000 you can see general information about the server, this is useful for print instance IPs behind a load balancer

output:

```
Array
(
    [DOCUMENT_ROOT] => /var/www
    [REMOTE_ADDR] => 172.17.0.1
    [REMOTE_PORT] => 57392
    [SERVER_SOFTWARE] => PHP 8.0.3 Development Server
    [SERVER_PROTOCOL] => HTTP/1.1
    [SERVER_NAME] => 0.0.0.0
    [SERVER_PORT] => 8000
    [REQUEST_URI] => /
    [REQUEST_METHOD] => GET
    [SCRIPT_NAME] => /index.php
    [SCRIPT_FILENAME] => /var/www/index.php
    [PHP_SELF] => /index.php
    [HTTP_HOST] => localhost:8000
    [HTTP_USER_AGENT] => Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:87.0) Gecko/20100101 Firefox/87.0
    [HTTP_ACCEPT] => text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
    [HTTP_ACCEPT_LANGUAGE] => en-US,en;q=0.5
    [HTTP_ACCEPT_ENCODING] => gzip, deflate
    [HTTP_CONNECTION] => keep-alive
    [HTTP_COOKIE] => _ga=GA1.1.1522055687.1614871793; __hstc=181257784.5151beece74cd673db46501d810a1689.1614871793698.1614871793698.1614871793698.1; hubspotutk=5151beece74cd673db46501d810a1689; rdtrk=%7B%22id%22%3A%225958a742-c285-4b77-a149-6c5d95cf8341%22%7D; _fbp=fb.0.1614871796720.1079807450
    [HTTP_UPGRADE_INSECURE_REQUESTS] => 1
    [REQUEST_TIME_FLOAT] => 1619041384.6155
    [REQUEST_TIME] => 1619041384
    [argv] => Array
        (
        )

    [argc] => 0
)
```

### Stressing CPU

You can reach `/cpu.php?seconds=10`

This will stress a single core of the system, the param `seconds` is the amount of time in seconds that this CPU will be stressed, the default value is "1"

### Stressing Memory

You can reach `/memory.php?megas=2048&seconds=10`

This will get an amount of memory for a few seconds, the param `megas` is the amount of memory(500MB by default), the param `seconds` is the time in seconds before the memory be released, 1 second by default.

**Important: if you are testing autoscaling by memory, the PHP builtin server handles 1 request per time and the request for memory endpoint only finishes when `time` is over, this will get your instance unhealthy by the load balancer cheks**

### PHP info

Acess `/info.php` to see phpinfo