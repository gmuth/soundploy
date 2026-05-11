# SoundPloy v2

This project is about enabling Bose SoundTouch devices to stream radio stations.
The target audience are users who don't want to tinker with their own servers.

## Pre-requisites

- You need to know how to use `telnet` and `Postman`
- The device is NOT reset to factory settings

## Configure the device

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

## Lookup the stream url

Check out the website of your favorite radio station and look for the stream url.
Or use a station directory which lists the stream url.
- [streamurl.link](https://streamurl.link)
- [radio-browser.info](https://www.radio-browser.info)

## Start the custom radio stream

We'll use the _orion data API_ for this and send a POST request to the device using [Postman](https://getpostman.com).

1. Start Postman and open [collection SoundPloy](https://www.postman.com/soundploy-1806940/bose-soundtouch/collection/5y09857/soundploy)
2. Navigate to request _Play custom radio stream_
3. Select an existing environment or create a new one 
4. Set variable `soundtouch` to the IP address of your device
5. Navigate to _Scripts > Pre-request_
6. Change the values for `name` and `streamUrl`
7. Click Send

Now your device should start playing the stream.

## Save the stream as a preset

Press and hold the desired preset button on your device or remote until you hear a beep.


