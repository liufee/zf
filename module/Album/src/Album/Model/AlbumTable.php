<?php
/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2017/2/16
 * Time: 14:27
 */

namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;

class AlbumTable
{

    protected $tableGateway;

    public function __construct( TableGateway $tableGateway )
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getAlbum( $id )
    {
        $id = (int) $id;
        $rowSet = $this->tableGateway->select( ['id'=>$id] );
        $row = $rowSet->current();
        if( !$row ){
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveAlbum( Album $album )
    {
        $data = [
            'artist' => $album->artist,
            'title' => $album->title,
        ];
        $id = (int) $album->id;
        if(  $id == 0 ){
            $this->tableGateway->insert($data);
        }else{
            if( $this->getAlbum($id) ){
                $this->tableGateway->update($data, ['id'=>$id]);
            }else{
                throw new \Exception('Album id does not exist');
            }
        }
    }

    public function deleteAlbum($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}