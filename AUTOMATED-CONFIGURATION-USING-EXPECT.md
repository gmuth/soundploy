## Automated configuration with expect

You can use the cli tool [expect](https://linux.die.net/man/1/expect) to automate the telnet commands:

`SOUNDTOUCH="192.168.2.105" curl -s http://soundploy.gmuth.de/configure_soundtouch | expect -f -`
