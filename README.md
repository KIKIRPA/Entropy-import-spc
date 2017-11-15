# Entropy-import-spc
Plugin for importing Thermo Galactic SPC files into Entropy

## Prerequisites
- PHP 7+
- Python 2.7+
- NumPy
- spc module https://github.com/rohanisaac/spc
- Entropy https://github.com/KIKIRPA/Entropy

## Installation
Find your Entropy installation directory and copy the SPC directory to
[entropy dir]/import

Make sure the http-server has read permissions to this directory and its contents

## Register the plugin
Add the following section to the end of import configuration file, usually stored in {Entropy installation directory}/data/config/import.json. Make sure the result is a valid JSON file.

```
"SPC": {
        "datatypes": {
            "raman": {},
            "ftir": {}
        },
        "extensions": {
            "spc": {}
        }    
}
```

## Remark
Updating Entropy using its setup.php tool will remove the SPC directory.
