# SoundPloy V2

This guide is about reenabling Bose SoundTouch devices to play radio streams.
The target audience are users who don't want to tinker with their own servers
(e.g. like [soundcork](https://github.com/deborahgu/soundcork) or others).

## Configure device

[Telnet to the device using port 17000](https://www.youtube.com/watch?v=yfa0RaGVpyY) and run the following commands:
```
envswitch boseurls set ";curl soundploy.gmuth.de/v2_install|sh" ;
sys reboot
```
After two reboots (about 2-3 minutes) you should try your existing presets,
however it's likely that you have to create new ones.

## Lookup stream url

Check out the website of your favorite radio station and look for the stream url.
Or use a station directory which lists the stream url.
- [streamurl.link](https://streamurl.link)
- [radio-browser.info](https://www.radio-browser.info)

## Start custom radio stream

We'll use the [orion station API](https://github.com/gmuth/soundploy/blob/main/v2/orion/station.php) for this and send a POST request to the device using [Postman](https://getpostman.com).

![SoundPloy Postman](soundploy-postman.png)

1. Start Postman (desktop application) and open [workspace Bose SoundTouch](https://soundploy-1806940.postman.co/workspace/70cec626-e5cf-4cd5-884e-80bd4a7ca40c)
2. Navigate to [collection SoundPloy](https://www.postman.com/soundploy-1806940/bose-soundtouch/collection/5y09857/soundploy) and request _Play custom radio stream_
3. Select an existing environment or create a new one 
4. Set variable `soundtouch` to the IP address of your device
5. Navigate to _Scripts > Pre-request_
6. Change the values of `name` and `streamUrl`
7. Click _Send_

Now your device should start playing the stream.

## Save radio stream to preset button

Press and hold the desired preset button on your device or remote until you hear a beep.
From now on you can start the stream by pressing the preset button.

## Alternative to Postman

Instead of Postman you could also use Chrome and phfu's Preset Manager:
https://phfu.codeberg.page/soundtouch-preset-manager

### Known issues

Devices with firmware below version 27.x are not fully supported by SoundPloy.
You can check your firmware by navigating to `http://your-soundtouch-ip:8090/info`.
The 27.x firmware update should be available from Bose or other sources.