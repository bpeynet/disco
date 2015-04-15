<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_cd_comment',
   'indexes' => 
   array(
   'cd' => 
   array(
    'columns' => 
    array(
    0 => 'cd',
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
   'fieldName' => 'user',
   'columnName' => 'user',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'comment',
   'columnName' => 'comment',
   'type' => 'text',
   'nullable' => false,
   'length' => NULL,
   'fixed' => false,
   'comment' => '',
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
   'fieldName' => 'idForum',
   'columnName' => 'id_forum',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);