<?php

namespace App\Controllers;
use App\Models\PersonajeModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CrudController extends BaseController
{

    public function __construct() {
        
        helper('text');
    }

    public function view(string $page = 'viewusers'){

        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {

            throw new PageNotFoundException($page);

        }

        $usuarios = new UserModel();

        $data_users = [
            'usuario' => $usuarios->where('status', 'activo')->asObject()->paginate(5),
            'pager' => $usuarios->pager
        ];

        $data['title'] = ucfirst($page);

        return view('templates/header', $data)
            . view('pages/' . $page, $data_users)
            . view('templates/footer');

        
    }

    public function index(string $page = 'addusers'){

        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {

            throw new PageNotFoundException($page);

        }

        $data['title'] = ucfirst($page);

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');

        
    }

    public function save(string $page = 'viewusers'){
        
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {

            throw new PageNotFoundException($page);

        }

        $usuario = new UserModel();

        $fecha_creacion = new Time('now', 'America/Mexico_City');

        $password = random_string('alnum', 8);


        if($this->validate('user')){

            $usuario->insert([
                'nombre' => $this->request->getPost('nombre'),
                'apellidos' => $this->request->getPost('apellidos'),
                'sexo' => $this->request->getPost('sexo'),
                'correo_electronico' => $this->request->getPost('correo_electronico'),
                'telefono' => $this->request->getPost('telefono'),
                'codigo_postal' => $this->request->getPost('codigo_postal'),
                'colonia' => $this->request->getPost('list_colonias'),
                'dele_muni' => $this->request->getPost('dele_muni'),
                'estado' => $this->request->getPost('estado'),
                'fecha_registro' => $fecha_creacion,
                'tipo_usuario' => $this->request->getPost('tipo_usuario'),
                'password' => $password,
                'status' => 'activo',
            ]);
    
            session()->setFlashdata("success", "la contrasena para el usuario es: ". $password  );

            $usuarios = new UserModel();

            $data_users = [
                'usuario' => $usuarios->where('status', 'activo')->asObject()->paginate(5),
                'pager' => $usuarios->pager
            ];

            $data['title'] = ucfirst($page);

            return view('templates/header', $data)
                . view('pages/' . $page, $data_users)
                . view('templates/footer');

        }else{

            $validation = \Config\Services::validation();

            $errors = (implode(" ", $validation->getErrors()));

            session()->setFlashdata("error", $errors);

            $usuarios = new UserModel();

            $data_users = [
                'usuario' => $usuarios->where('status', 'activo')->asObject()->paginate(5),
                'pager' => $usuarios->pager
            ];

            $data['title'] = ucfirst($page);

            return view('templates/header', $data)
                . view('pages/' . $page, $data_users)
                . view('templates/footer');
            
        
        }
        
        

    }

    public function search(){

        $case =$this->request->getPost('send');

        switch ($case) {
            case 'edit':

                $page = 'edituser';

                if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {

                    throw new PageNotFoundException($page);
        
                }
        
                $id =$this->request->getPost('id');
                $usuario = new UserModel();
                $data_user['usuario'] = $usuario->find($id);
        
                $data['title'] = ucfirst($page);
        
                return view('templates/header', $data)
                    . view('pages/' . $page, $data_user)
                    . view('templates/footer');
                
                break;

            case 'change_status':

                $page = 'viewusers';

                if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {

                    throw new PageNotFoundException($page);
        
                }
        
                $usuario = new UserModel();
        
                $id =$this->request->getPost('id');

                $usuario->update($id,['status' => 'inactivo']);
                
                //session()->setFlashdata("success", "se actualizo el status del usuario correctamente"  );
    
                $usuarios = new UserModel();
    
                $data_users = [
                    'usuario' => $usuarios->where('status', 'activo')->asObject()->paginate(5),
                    'pager' => $usuarios->pager
                ];
    
                $data['title'] = ucfirst($page);
    
                return view('templates/header', $data)
                    . view('pages/' . $page, $data_users)
                    . view('templates/footer');
                
                break;

            case 'view_details':

                $page = 'viewdetails';

                if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {

                    throw new PageNotFoundException($page);
        
                }
        
                $id =$this->request->getPost('id');
                $usuario = new UserModel();
                $data_user['usuario'] = $usuario->find($id);
        
                $data['title'] = ucfirst($page);
        
                return view('templates/header', $data)
                    . view('pages/' . $page, $data_user)
                    . view('templates/footer');

                
                break;
        

            
        }
       
    }

    public function save_edit(string $page = 'viewusers'){

        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {

            throw new PageNotFoundException($page);

        }

        $usuario = new UserModel();

        $id =$this->request->getPost('id');

        if($this->validate('user')){

            $usuario->update($id,[
                'nombre' => $this->request->getPost('nombre'),
                'apellidos' => $this->request->getPost('apellidos'),
                'sexo' => $this->request->getPost('sexo'),
                'correo_electronico' => $this->request->getPost('correo_electronico'),
                'telefono' => $this->request->getPost('telefono'),
                'codigo_postal' => $this->request->getPost('codigo_postal'),
                'colonia' => $this->request->getPost('list_colonias'),
                'dele_muni' => $this->request->getPost('dele_muni'),
                'estado' => $this->request->getPost('estado'),
                'tipo_usuario' => $this->request->getPost('tipo_usuario'),
            ]);
            
            session()->setFlashdata("success", "se actualizo la informacion correctamente"  );

            $usuarios = new UserModel();

            $data_users = [
                'usuario' => $usuarios->where('status', 'activo')->asObject()->paginate(5),
                'pager' => $usuarios->pager
            ];

            $data['title'] = ucfirst($page);

            return view('templates/header', $data)
                . view('pages/' . $page, $data_users)
                . view('templates/footer');
            

        }else{

            
            $validation = \Config\Services::validation();

            $errors = (implode(" ", $validation->getErrors()));

            session()->setFlashdata("error", $errors);

            $usuarios = new UserModel();

            $data_users = [
                'usuario' => $usuarios->where('status', 'activo')->asObject()->paginate(5),
                'pager' => $usuarios->pager
            ];

            $data['title'] = ucfirst($page);

            return view('templates/header', $data)
                . view('pages/' . $page, $data_users)
                . view('templates/footer');
            
        
        }
        

        
    }

    public function export()
	{
		$usuario = new UserModel();

		$data = $usuario->findAll();

		$file_name = 'reporte.xlsx';

		$spreadsheet = new Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Nombre');

		$sheet->setCellValue('B1', 'Apellidos');

		$sheet->setCellValue('C1', 'Correo Electronico');

		$sheet->setCellValue('D1', 'Status');

		$count = 2;

		foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $row['nombre']);

			$sheet->setCellValue('B' . $count, $row['apellidos']);

			$sheet->setCellValue('C' . $count, $row['correo_electronico']);

			$sheet->setCellValue('D' . $count, $row['status']);

			$count++;
		}

		$writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");

		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');

		header('Expires: 0');

		header('Cache-Control: must-revalidate');

		header('Pragma: public');

		header('Content-Length:' . filesize($file_name));

		flush();

		readfile($file_name);

	}
}

