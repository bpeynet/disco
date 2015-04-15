<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_support',
   'indexes' => 
   array(
   'support' => 
   array(
    'columns' => 
    array(
    0 => 'support',
    ),
   ),
   'libelle' => 
   array(
    'columns' => 
    array(
    0 => 'libelle',
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
   'fieldName' => 'support',
   'columnName' => 'support',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'libelle',
   'columnName' => 'libelle',
   'type' => 'string',
   'nullable' => false,
   'length' => 45,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'actif',
   'columnName' => 'actif',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'alerteProgra',
   'columnName' => 'alerte_progra',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'recep',
   'columnName' => 'recep',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '1',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);