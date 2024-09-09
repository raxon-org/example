<?php
namespace Package\Raxon\Example\Trait;

use Raxon\App;
use Raxon\Config;

use Raxon\Exception\FileWriteException;
use Raxon\Module\Dir;
use Raxon\Module\Core;
use Raxon\Module\Event;
use Raxon\Module\File;
use Raxon\Module\Host;
use Raxon\Module\Parse;
use Raxon\Module\Sort;

use Raxon\Node\Model\Node;

use Exception;

use Raxon\Exception\DirectoryCreateException;
use Raxon\Exception\ObjectException;
trait Main {

    /**
     * @throws DirectoryCreateException
     * @throws Exception
     */
    public function site($options=[]): void
    {
        $options = Core::object($options, Core::OBJECT_OBJECT);
        $object = $this->object();
        if($object->config(Config::POSIX_ID) !== 0){
            return;
        }
        $command = Core::binary($object) .
            ' raxon/basic apache2 site create' .
            ' -server.admin=development@universeorange.com' .
            ' -server.name=example.com' .
            ' -development'
        ;
        foreach($options as $key => $value){
            if($value === true){
                $command .= ' -' . $key;
            } else {
                $command .= ' -' . $key . '=' . $value;
            }
        }
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo rtrim($output, PHP_EOL) . PHP_EOL;
        }
        if(!empty($notification)){
            echo rtrim($notification, PHP_EOL) . PHP_EOL;
        }
        $command = Core::binary($object) .
            ' raxon/basic apache2 site enable' .
            ' -server.name=example.local'
        ;
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo rtrim($output, PHP_EOL) . PHP_EOL;
        }
        if(!empty($notification)){
            echo rtrim($notification, PHP_EOL) . PHP_EOL;
        }
        $command = Core::binary($object) . ' raxon/basic apache2 reload';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo rtrim($output, PHP_EOL) . PHP_EOL;
        }
        if(!empty($notification)){
            echo rtrim($notification, PHP_EOL) . PHP_EOL;
        }
    }

    /**
     * @throws ObjectException
     * @throws FileWriteException
     * @throws Exception
     */
    public function host_create($options=[]): bool
    {
        $options = Core::object($options, Core::OBJECT_OBJECT);
        $object = $this->object();
        if($object->config(Config::POSIX_ID) !== 0){
            return false;
        }
        $force = false;
        if(property_exists($options, 'force')){
            $force = $options->force;
        }
        $node = new Node($object);
        $class = 'System.Host';
        $record = (object) [
            'name' => 'Example.Com',
            'domain' => 'example',
            'extension' => 'com',
            'url' => (object) [
                'development' => 'https://example.local/',
                'production' => 'https://example.com/',
            ]
        ];
        $exist = $node->record($class, $node->role_system(), [
            'where' => [
                [
                    'value' => $record->name,
                    'attribute' => 'name',
                    'operator' => '===',
                ]
            ]
        ]);
        $response = [];
        if($exist && $force === false){
            throw new Exception('Host create error: host already exists, use option -force to overwrite');
        }
        elseif(
            $exist &&
            is_array($exist) &&
            array_key_exists('node', $exist) &&
            property_exists($exist['node'], 'uuid')
        ){
            $record->uuid = $exist['node']->uuid;
            $response = $node->put($class, $node->role_system(), $record);
        }
        elseif(!$exist) {
            $response = $node->create($class, $node->role_system(), $record);
        }
        if(array_key_exists('node', $response)){
            return true;
        }
        return false;
    }

    /**
     * @throws ObjectException
     * @throws FileWriteException
     * @throws Exception
     */
    public function host_mapper_create($options=[]): bool
    {
        $options = Core::object($options, Core::OBJECT_OBJECT);
        $object = $this->object();
        if($object->config(Config::POSIX_ID) !== 0){
            return false;
        }
        $force = false;
        if(property_exists($options, 'force')){
            $force = $options->force;
        }
        $node = new Node($object);
        $class = 'System.Host.Mapper';
        $record = (object) [
            'source' => 'example.local',
            'destination' => 'example.com'
        ];
        $exist = $node->record($class, $node->role_system(), [
            'where' => [
                [
                    'value' => $record->source,
                    'attribute' => 'source',
                    'operator' => '===',
                ]
            ]
        ]);
        $response = [];
        if($exist && $force === false){
            throw new Exception('Host.Mapper create error: host.map already exists, use option -force to overwrite');
        }
        elseif(
            $exist &&
            is_array($exist) &&
            array_key_exists('node', $exist) &&
            property_exists($exist['node'], 'uuid')
        ){
            $record->uuid = $exist['node']->uuid;
            $response = $node->put($class, $node->role_system(), $record);
        } elseif(!$exist) {
            $response = $node->create($class, $node->role_system(), $record);
        }
        if(array_key_exists('node', $response)){
            return true;
        }
        return false;
    }

    /**
     * @throws ObjectException
     * @throws FileWriteException
     * @throws Exception
     */
    public function host_name_create($options=[]): bool
    {
        $options = Core::object($options, Core::OBJECT_OBJECT);
        $object = $this->object();
        if ($object->config(Config::POSIX_ID) !== 0) {
            return false;
        }
        $force = false;
        if (property_exists($options, 'force')) {
            $force = $options->force;
        }
        $has = false;
        $command = Core::binary($object) . ' raxon/host name has -host=example.local';
        Core::execute($object, $command, $output, $notification);
        if (!empty($output)) {
            $has = trim($output);
            switch ($has) {
                case 'true':
                    $has = true;
                    break;
                case 'false':
                    $has = false;
                    break;
            }
        }
        if (
            $has === false
        ) {
            //create
            $command = Core::binary($object) . ' raxon/host name add -ip=127.0.0.1 -host=example.local';
            Core::execute($object, $command, $output, $notification);
            if(!empty($output)){
                echo rtrim($output, PHP_EOL) . PHP_EOL;
            }
            if(!empty($notification)){
                echo rtrim($notification, PHP_EOL) . PHP_EOL;
            }
            return true;
        } elseif (
            $has === true &&
            $force === true
        ) {
            $command = Core::binary($object) . ' raxon/host name delete -host=example.local';
            Core::execute($object, $command, $output, $notification);
            if(!empty($output)){
                echo rtrim($output, PHP_EOL) . PHP_EOL;
            }
            if(!empty($notification)){
                echo rtrim($notification, PHP_EOL) . PHP_EOL;
            }
            $command = Core::binary($object) . ' raxon/host name add -ip=127.0.0.1 -host=example.local';
            Core::execute($object, $command, $output, $notification);
            if(!empty($output)){
                echo rtrim($output, PHP_EOL) . PHP_EOL;
            }
            if(!empty($notification)){
                echo rtrim($notification, PHP_EOL) . PHP_EOL;
            }
            return true;
        }
        return false;
    }
}