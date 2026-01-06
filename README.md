> [!CAUTION]
> THIS REPOSITORY HAS BEEN ABANDONED.
>
> The project moved to https://github.com/shopgate/click-and-reserve-shopware6

# Click & Reserve Plugin for Shopware 6
This plugin enables merchants to easily offer click & reserve functionality in their Shopware 6 Shop. 
It uses our [storefront javascript library](https://github.com/retail-red/storefront-library).
The script adds a “reserve” button to the product detail page, via which a new reservation can be placed.

## Installation
1. Download the [latest releases](https://github.com/retail-red/shopware-6/releases/latest)
1. Upload it as a plugin in your Shopware backend.
1. Install and activate it
1. Open the config of our plugin and enter your Storefront API Key (Shopgate Admin -> Settings -> General -> Storefront API Key)

## Configuration
Our plugin comes with a bunch of configuration options. The only setting that you must setup there is your API Key.
You will find your key in our admin in Settings -> General -> Storefront API Key

All other settings are optional. 
More details can be found in the [Shopgate Storefront Library Documentation](https://github.com/retail-red/storefront-library) 

### Custom Translations
In case you want to set custom translations for certain strings, you can use this template:
```
{
      "de":{
          "reserve.submit":"Reservieren"
      },
      "en":{
           "reserve.submit":"Reserve NOW"
      }
}
```
Available strings can be found details can be found [here](https://github.com/retail-red/storefront-library/blob/master/src/locales/en.js). 

## Developer note
For SW marketplace upload you need to zip this repository like this
zip -r SgateClickAndReserveSW6.zip SgateClickAndReserveSW6 -x ".*" -x "__MACOSX"

## Support
Contact us via [support@shopgate.com](mailto:support@shopgate.com)

## Changelog
See [CHANGELOG.md](CHANGELOG.md) file for more information.
