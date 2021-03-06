# Exporter
The aim of the pandaac exporter is to provide a simple & quick interface to export data from the common XML files found within the data/ directory of your Open Tibia server.

> _It is strongly recommended that you cache the response rather than parsing it over and over again._

> _As of right now, this exporter assumes that you're using [The Forgotten Server 1.1](https://github.com/otland/forgottenserver/tree/1.1). I have no immediate plans to expand this to any other distrobutions until I expand the distrobution range for [pandaac](https://github.com/pandaac/pandaac) itself. However, if there's enough public pressure for a specific distrobution, I may reconsider._

## Requirements
* PHP 5.6.4+
* PHP Extensions
  * libxml

## Install
##### Via Composer
```
composer require pandaac/exporter
```

## Usage
Pass the absolute path to your Open Tibia server as the first argument of the `Exporter` object and specify which parser you would like to use as the first argument of the `parse` method of the `Exporter` object.

The `parse` method also accepts a second argument for additional attributes (depends on the parser), and a third argument for overriding the default filepath (or providing a specific parser with a filepath).

```php
use pandaac\Exporter\Parsers;
use pandaac\Exporter\Exporter;

$exporter = new Exporter(
    '/home/pandaac/theforgottenserver'
);

$response = $exporter->parse(new Parsers\Weapons);
```

## Parsers
Parsers are what decides how to parse a certain file, and how to structure its response. It is important you use the correct parser for the correct file.

### XML Parsers
+ **Actions**  

   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Actions);
   ```

+ **Chat Channels**  

   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\ChatChannels);
   ```

+ **Commands**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Commands);
   ```

+ **Creature Scripts**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\CreatureScripts);
   ```

+ **Events**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Events);
   ```

+ **Global Events**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\GlobalEvents);
   ```

+ **Groups**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Groups);
   ```

+ **Items**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Items);
   ```

+ **Map Houses**  
   > You must specify the relative filename as the third argument.  

   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\MapHouses, [], 'forgotten-house.xml');
   ```

+ **Map Spawns**  
   > You must specify the relative filename as the third argument.  

   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\MapSpawns, [], 'forgotten-spawn.xml');
   ```

+ **Monster**  
   > You must specify the relative filename as the third argument.  

   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Monster, [], 'Demons/Demon.xml');
   ```

+ **Monsters**  
   > You may also load the data from within each individual monster file by setting the `recursive` attribute to `true`.  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Monsters, [ 'recursive' => true ]);
   ```

+ **Mounts**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Mounts);
   ```

+ **Movements**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Movements);
   ```

+ **NPC**  
   > You must specify the relative filename as the third argument.  

   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\NPC, [], 'The Oracle.xml');
   ```

+ **Outfits**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Outfits);
   ```

+ **Quests**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Quests);
   ```

+ **Raid**  
   > You must specify the relative filename as the third argument.  

   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Raid, [], 'testraid.xml');
   ```

+ **Raids**  
   > You may also load the data from within each individual raid file by setting the `recursive` attribute to `true`.  

   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Raids, [ 'recursive' => true ]);
   ```

+ **Spells**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Spells);
   ```

+ **Stages**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Stages);
   ```

+ **TalkActions**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\TalkActions);
   ```

+ **Vocations**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Vocations);
   ```

+ **Weapons**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Weapons);
   ```

+ **XMLSource**  
   If you have a string containing XML, you may also parse that using the following setup.

   ```php
   use pandaac\Exporter\Parsers;
   use pandaac\Exporter\Exporter;
   use pandaac\Exporter\Sources\StringContent;

   $exporter = new Exporter(
       new StringContent('<?xml version="1.0" encoding="UTF-8"?><custom></custom>')
   );

   $response = $exporter->parse(new Parsers\XMLSource);
   ```

### OTBM Parsers
> The OTBM engine has not yet been developed, and thus the following parsers are rendered obsolete for the time being.

+ **Towns**  
   
   ```php
   $exporter->parse(new \pandaac\Exporter\Parsers\Towns);
   ```

## Contributing
Please refer to the [PSR-2 guidelines](http://www.php-fig.org/psr/psr-2/) and squash your commits together into one before submitting a pull request.

Thank you.
