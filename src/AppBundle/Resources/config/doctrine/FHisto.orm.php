<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_histo',
   'indexes' => 
   array(
   'type_his' => 
   array(
    'columns' => 
    array(
    0 => 'jour',
    1 => 'typ_his',
    ),
   ),
   'jour' => 
   array(
    'columns' => 
    array(
    0 => 'jour',
    ),
   ),
   'user' => 
   array(
    'columns' => 
    array(
    0 => 'user',
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
   'fieldName' => 'chrono',
   'columnName' => 'chrono',
   'type' => 'datetime',
   'nullable' => false,
   'comment' => '',
   'default' => '0000-00-00 00:00:00',
  ));
$metadata->mapField(array(
   'fieldName' => 'jour',
   'columnName' => 'jour',
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
   'fieldName' => 'typHis',
   'columnName' => 'typ_his',
   'type' => 'string',
   'nullable' => false,
   'length' => NULL,
   'fixed' => false,
   'comment' => '',
   'default' => 'CRE',
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
$metadata->mapField(array(
   'fieldName' => 'nomUser',
   'columnName' => 'nom_user',
   'type' => 'string',
   'nullable' => false,
   'length' => 100,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'ip',
   'columnName' => 'ip',
   'type' => 'string',
   'nullable' => false,
   'length' => 20,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'comment',
   'columnName' => 'comment',
   'type' => 'string',
   'nullable' => false,
   'length' => 250,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'version',
   'columnName' => 'version',
   'type' => 'string',
   'nullable' => false,
   'length' => 10,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'rotation',
   'columnName' => 'rotation',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);