<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_config',
   'indexes' => 
   array(
   'cle' => 
   array(
    'columns' => 
    array(
    0 => 'cle',
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
   'fieldName' => 'cle',
   'columnName' => 'cle',
   'type' => 'string',
   'nullable' => false,
   'length' => 50,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'valeur',
   'columnName' => 'valeur',
   'type' => 'string',
   'nullable' => false,
   'length' => 500,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'user',
   'columnName' => 'user',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);