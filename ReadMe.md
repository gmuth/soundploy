# SoundPloy v2

This project is about re-enabling Bose SoundTouch devices to play radio streams.
The target audience are users who don't want to tinker with their own servers.

## Pre-requisites

- You should know or learn how to use `telnet` and `Postman`
- The device is NOT reset to factory settings

## Configure device

[Telnet into the device using port 17000](https://www.youtube.com/watch?v=yfa0RaGVpyY) and run the following commands:
```
sys configuration bmxRegistryUrl http://soundploy.gmuth.de/v2/services
envswitch boseurls set https://marge.bose.com https://worldwide.bose.com/updates/soundtouch
sys reboot
```

Optionally you can check if the configuration was successful by running:
```
getpdo CurrentSystemConfiguration
```
To end the telnet session run `exit`.

## Lookup stream url

Check out the website of your favorite radio station and look for the stream url.
Or use a station directory which lists the stream url.
- [streamurl.link](https://streamurl.link)
- [radio-browser.info](https://www.radio-browser.info)

## Start custom radio stream

We'll use the _orion data API_ for this and send a POST request to the device using [Postman](https://getpostman.com).

![SoundPloy Postman](soundploy-postman.png)

1. Start Postman and open [workspace Bose SoundTouch](https://soundploy-1806940.postman.co/workspace/70cec626-e5cf-4cd5-884e-80bd4a7ca40c)
2. Navigate to [collection SoundPloy](https://www.postman.com/soundploy-1806940/bose-soundtouch/collection/5y09857/soundploy) and request _Play custom radio stream_
3. Select an existing environment or create a new one 
4. Set variable `soundtouch` to the IP address of your device
5. Navigate to _Scripts > Pre-request_
6. Change the values of `name` and `streamUrl`
7. Click _Send_

Now your device should start playing the stream.

## Save radio stream to preset

Press and hold the desired preset button on your device or remote until you hear a beep.
