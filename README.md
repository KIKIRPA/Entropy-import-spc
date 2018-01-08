# Entropy-import-spc
Plugin for importing Thermo Galactic SPC files into Entropy

## Prerequisites
- PHP 7+
- Python 2.7+
- NumPy
- spc module https://github.com/rohanisaac/spc
- Entropy https://github.com/KIKIRPA/Entropy

## Installation
Find your Entropy installation directory and merge the contents of the 'convert' directory of this package into the the 'convert' directory of your Entropy instance. Copy each file and subdirectory to the destination without deleting the existing files and directories.

Make sure the http-server has read permissions to the copied directories and files.

## Register the plugin
Add the following section to the end of import configuration file, usually stored in {Entropy installation directory}/data/config/import.json. 

```
"spc": {
        "datatypes": {
            "raman": {},
            "ftir": {}
        },
        "extensions": {
            "spc": {}
        }    
}
```

Verify if the updated import.json file is a valid JSON file. (In Ubuntu and onter linuxes, the 'jsonlint' package and command can come handy) 

## Remark
Reinstalling and updating Entropy (using its setup.php tool) will remove the SPC directory. With every update of Entropy, this plug-in needs to be reinstalled manually. Automatic updating and reinstalling of plug-ins is planned.
