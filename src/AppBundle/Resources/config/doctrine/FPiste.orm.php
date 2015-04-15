<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_piste',
   'indexes' => 
   array(
   'cd' => 
   array(
    'columns' => 
    array(
    0 => 'cd',
    ),
   ),
   'artiste' => 
   array(
    'columns' => 
    array(
    0 => 'artiste',
    ),
   ),
   'piste' => 
   array(
    'columns' => 
    array(
    0 => 'cd',
    1 => 'disque',
    2 => 'piste',
    ),
   ),
   ),
  ));
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'dbkey',
   'columnName' => 'dbkey',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'id' => true,
  ));
$metadata->mapField(array(
   'fieldName' => 'piste',
   'columnName' => 'piste',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'cd',
   'columnName' => 'cd',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'disque',
   'columnName' => 'disque',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'titre',
   'columnName' => 'titre',
   'type' => 'string',
   'nullable' => false,
   'length' => 300,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'artiste',
   'columnName' => 'artiste',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'langue',
   'columnName' => 'langue',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'anim',
   'columnName' => 'anim',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'paulo',
   'columnName' => 'paulo',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'star',
   'columnName' => 'star',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);