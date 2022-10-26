<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller{

    public function index(){

        $libro = new libro();
        $datos['libros']= $libro->orderBy('id','ASC')->findAll();
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/pie');

        return view('libros/listar', $datos);

    }

    public function crear(){

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/pie');

        return view('libros/crear', $datos);

    }

    public function guardar(){

        $libro = new libro();

        $nombre = $this->request->getVar('nombre');
        
        if($imagen=$this->request->getFile('imagen')){
            $nombreRandom = $imagen->getRandomName();
            $imagen->move('../public/upload/',$nombreRandom);

            $datos=[
                'nombre'=>$this->request->getVar('nombre'),
                'imagen'=>$nombreRandom
            ];
            $libro->insert($datos);
        }

        return $this->response->redirect(base_url('/listar'));
        #return view('libros/crear');
    }

    public function borrar($id=null){

        $libro = new libro();
        $datoLibro = $libro->where('id',$id)->first();
        $ruta = ('../public/upload/'.$datoLibro['imagen']);
        if(file_exists($ruta)){
            unlink($ruta);
        }
        
        $libro->where('id',$id)->delete($id);

        return $this->response->redirect(base_url('/listar'));

    }

    public function editar($id=null){

        $libro = new libro();
        $datos['libro'] = $libro->where('id',$id)->first();
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/pie');

        return view('libros/editar', $datos);

    }

    public function actualizar(){

        $libro = new libro();
        $id = $this->request->getVar('id');

        if($nombre = $this->request->getVar('nombre')){

            $datos=[
                'nombre'=>$this->request->getVar('nombre')
            ];
            $libro->update($id,$datos);

        }

        $validacion = $this->validate([
            'imagen'=>[
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);


        if($validacion){

            $datoLibro = $libro->where('id',$id)->first();
            $ruta = ('../public/upload/'.$datoLibro['imagen']);
            print_r($ruta);
            if(file_exists($ruta)){
                unlink($ruta);
            }

            if($imagen=$this->request->getFile('imagen')){
                $nombreRandom = $imagen->getRandomName();
                $imagen->move('../public/upload/',$nombreRandom);
    
                $datos=[
                    'imagen'=>$nombreRandom
                ];
                $libro->update($id,$datos);
            }
        }

        return $this->response->redirect(base_url('/listar'));

    }

}