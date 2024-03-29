# retail.red plugin for Shopware 6
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
More details can be found here https://github.com/retail-red/storefront-library 

## Developer note
For SW marketplace upload you need to zip this repository like this
zip -r SgateClickAndReserveSW6.zip SgateClickAndReserveSW6 -x ".*" -x "__MACOSX"

## Support
Contact us via [mail@retail.red](mailto:mail@retail.red)

## Changelog
See [CHANGELOG.md](CHANGELOG.md) file for more information.
