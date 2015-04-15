<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_log',
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
   'fieldName' => 'type',
   'columnName' => 'type',
   'type' => 'string',
   'nullable' => false,
   'length' => 10,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'log',
   'columnName' => 'log',
   'type' => 'text',
   'nullable' => false,
   'length' => NULL,
   'fixed' => false,
   'comment' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'ip',
   'columnName' => 'ip',
   'type' => 'string',
   'nullable' => false,
   'length' => 45,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'user',
   'columnName' => 'user',
   'type' => 'string',
   'nullable' => false,
   'length' => 45,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'page',
   'columnName' => 'page',
   'type' => 'string',
   'nullable' => false,
   'length' => 100,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'version',
   'columnName' => 'version',
   'type' => 'string',
   'nullable' => false,
   'length' => 45,
   'fixed' => false,
   'comment' => '',
   'default' => '',
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
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);