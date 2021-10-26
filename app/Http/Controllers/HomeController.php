<?php

namespace App\Http\Controllers;

use App\Models\indicator;
use Illuminate\Http\Request;
use App\Models\tsu_agency;
use App\Models\exp_indicator;
use App\Models\relation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\String\UnicodeString;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user()->agency_id;
        $relation = new relation();
   //   ส่วนงานบริหาร อื้นๆ
        $relat = $relation->getdata('SELECT * FROM indicators INNER JOIN indicator_list ON indicators.ind_name = indicator_list.indicator_list_id  where agency_id ='.$user.' order by indicator_list.indicator_list_id ASC;');
        $subrelat = $relation->getdata('SELECT *
        FROM exp_indicators
        INNER JOIN symbol
        ON exp_indicators.symbol_id = symbol.symbol_id ORDER BY ABS(exp_indicators.exind_num_name) ASC;');
        $sub_sub = $relation->getdata('SELECT *FROM ex_side_lists  ORDER BY ex_side_list_id ASC;');



    //   คณะ
        $relat_is_academic = $relation->getdata('SELECT * FROM indicators where agency_id ='.$user.' ;');
        $subrelat_is_academic = $relation->getdata('SELECT *FROM exp_indicators ORDER BY exind_name ASC;');
        $sub_side_is_academic = $relation->getdata('SELECT *FROM ex_side_lists  ORDER BY ex_side_list_id ASC;');




        return view('home',compact('relat','subrelat','relat_is_academic','subrelat_is_academic','sub_side_is_academic','sub_sub'));
        // $data = tsu_agency::all();
    }
        /*
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }


    public function userlist(){
        $userdatas = new relation();

        $userdata = $userdatas->getdata('select * from Users ;');

        return view('adminpage.userlist',compact('userdata'));
    }


    public function register(){

        $agencies = new relation();

        $agency = $agencies->getdata('SELECT * FROM  tsu_agency;');

        return view('adminpage.register',compact('agency'));


    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'name',
            'agency_id'=> 'required',
        ],


        );



        // User::create($request ->input([
        //     'name' => $request['name'],
        //     'username' => $request['username'],
        //     'password' => Hash::make($request['password']),

        // ]
        // ));



        User::create($request ->all());

        return  redirect()->route('home.userlist')->with('success','บันทึกข้อมูลสำเร็จ');
    }


    public function edit($user)
    {

         $user = User::find($user);



        // $agency = $agencies->getdata('SELECT *
        // FROM users
        // INNER JOIN tsu_agency
        // ON users.agency_id = tsu_agency.agency_id;');

        return view('adminpage.user_edit',compact('user'));

    }


    public function update(Request $request,$user)

    {
        $request->validate(
            [
            'username' => 'required|unique:username',
            'password' => 'required',
            'name' => 'required',
            'agency_id'=> 'required',
            ]
            );
            $user = User::find($user);
            $user->update($request->all());

        return redirect()->route('home.userlist')->with('success','แก้ไขข้อมูลสำเร็จ');
    }


    public function destroy($user)
    {
        $item = User::where('id',$user);
        $item->delete();
        return redirect()->route('home.userlist')->with('success','ลบข้อมูลสำเร็จ');
    }





















    //   php Generage word-------------------------------------------------------------------------------------


    public function generatedocx(){

        $user = auth()->user()->agency_id;
        $relation = new relation();

        // $relat = $relation->getdata('SELECT * FROM indicators INNER JOIN indicator_list ON indicators.ind_name = indicator_list.indicator_list_id  where agency_id ='.$user.' order by indicator_list.indicator_list_id ASC;');

        $relat = $relation->getdata('SELECT * FROM indicators INNER JOIN indicator_list ON indicators.ind_name = indicator_list.indicator_list_id  where agency_id ='.$user.' order by indicator_list.indicator_list_id ASC;');
        $subrelat = $relation->getdata('SELECT *
        FROM exp_indicators
        INNER JOIN symbol
        ON exp_indicators.symbol_id = symbol.symbol_id ORDER BY ABS(exp_indicators.exind_num_name) ASC;');

        $agency = $relation->getdata('select * from tsu_agency where agency_id ='.$user.';');
        $sub_sub = $relation->getdata('SELECT *FROM ex_side_lists  ORDER BY ex_side_list_id ASC;');


        // return $agency;


        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $file = 'บันทึกคำรองการปฏิบัติงาน มหาวิทยาลัยทักษิณ ปีการศึกษา 2564.docx';
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $phpWord->setDefaultFontSize(16);
        $phpWord->setDefaultFontName('TH SarabunPSK');
        $section = $phpWord->addSection();
        $cellRowSpan = array('vMerge' => 'restart','bgColor'=>'99ccff','valign'=>'center');
        $cellRowContinue = array('vMerge' => 'continue','valign'=>'center');
        $cellColSpan = array('gridSpan' => 2,'bgColor'=>'99ccff','valign'=>'center');
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addParagraphStyle('pStyle', array('bold'=>true,'align'=>'center'));

        $table = array('borderColor'=>'black', 'borderSize'=> 1);
        $phpWord->addTableStyle('table', $table);

        if($user == '2'){
        $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะเทคโนโลยีและการพัฒนาชุมชน",null,'pStyle');
        }
        elseif($user == '3'){
            $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะนิติศาสตร์",null,'pStyle');
       }
       elseif($user == '4'){
        $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะพยาบาลศาสตร์",null,'pStyle');
   }
   elseif($user == '5'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะมนุษยศาสตร์และสังคมศาสตร์",null,'pStyle');
}      elseif($user == '6'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะวิทยาการสุขภาพและการกีฬา",null,'pStyle');
}      elseif($user == '7'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะวิทยาศาสตร์",null,'pStyle');
}      elseif($user == '8'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะวิศวกรรมศาสตร์",null,'pStyle');
}      elseif($user == '9'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะศิลปกรรมศาสตร์",null,'pStyle');
}      elseif($user == '10'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะศึกษาศาสตร์",null,'pStyle');
}      elseif($user == '11'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะเศรษฐศาสตร์และบริหารธุรกิจ",null,'pStyle');
}      elseif($user == '12'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะอุตสาหกรรมเกษตรและชีวภาพ",null,'pStyle');
}      elseif($user == '13'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน วิทยาลัยการจัดการเพื่อการพัฒนา",null,'pStyle');
}      elseif($user == '14'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน วิทยาลัยนานาชาติ",null,'pStyle');
}      elseif($user == '15'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน บัณฑิตวิทยาลัย",null,'pStyle');
}      elseif($user == '16'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สำนักส่งเสริมการบริการวิชาการและภูมิปัญชุมชน",null,'pStyle');
}      elseif($user == '17'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สถาบันทักษิณคดีศึกษา",null,'pStyle');
}      elseif($user == '18'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สถาบันปฏิบัติการชุมชนเพื่อการศึกษาแบบบูรณาการ",null,'pStyle');
}      elseif($user == '19'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สถาบันวิจัยและพัฒนา",null,'pStyle');
}      elseif($user == '20'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สำนักคอมพิวเตอร์",null,'pStyle');
}      elseif($user == '21'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สำนักหอสมุด",null,'pStyle');
}      elseif($user == '22'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายการคลังและทรัพย์สิน",null,'pStyle');
}      elseif($user == '23'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายกิจการนิสิตวิทยาเขตพัทลุง",null,'pStyle');
}      elseif($user == '24'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายกิจการนิสิตวิทยาเขตสงขลา",null,'pStyle');
}      elseif($user == '25'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายตรวจสอบภายใน",null,'pStyle');
}      elseif($user == '26'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายนิติการ",null,'pStyle');
}      elseif($user == '27'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายบริหารกลางและทรัพยากรบุคคล",null,'pStyle');
}      elseif($user == '28'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายบริหารงานสภามหาวิทยาลัย",null,'pStyle');
}      elseif($user == '29'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายบริหารวิทยาเขตพัทลุง",null,'pStyle');
}      elseif($user == '30'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายบริหารวิทยาเขตสงขลา",null,'pStyle');
}      elseif($user == '31'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายประกันคุณภาพการศึกษา",null,'pStyle');
}      elseif($user == '32'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายแผนงาน",null,'pStyle');
}      elseif($user == '33'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายวิชาการ",null,'pStyle');
}      elseif($user == '34'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน งานวิเทศสัมพันธ์",null,'pStyle');
}      elseif($user == '35'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สำนักบ่มเพาะวิชาการเพื่อวิสาหกิจในชุมชน",null,'pStyle');
} elseif($user == '36'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายสื่อสารองค์กร",null,'pStyle');
}else{
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน",null,'pStyle');
}

        $section->addText("มหาวิทยาลัยทักษิณ ประจำปีการศึกษา 2564",null,'pStyle');

        $table = $section->addTable('table');
        $table->addRow(null, array('tblHeader' => true));
        $table->addCell(5000, $cellRowSpan)->addText("ตัวชี้วัด",null,'pStyle');
        // $table->addCell(2000, $cellRowSpan)->addText("");
        $table->addCell(3000, $cellColSpan)->addText("ผลการดำเนินงานย้อนหลัง",null,'pStyle');
        $table->addCell(2000, $cellRowSpan)->addText("ค่าเป้าหมาย 2564",null,'pStyle');
        $table->addCell(500, $cellRowSpan)->addText("หมายเหตุ",null,'pStyle');

        $table->addRow(100, array('tblHeader' => true));
        // $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(1500,['bgColor'=>'99ccff'])->addText("2562",null,'pStyle');
        $table->addCell(1500,['bgColor'=>'99ccff'])->addText("2563",null,'pStyle');
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);

        foreach ($relat as $value) {
            $table->addRow();
            $table->addCell(5000, ['bgColor'=>'a8d08d'])->addText($value->indicator_list_name, ['bold'=>true]);
            $table->addCell(1500, ['bgColor'=>'a8d08d'])->addText();
            $table->addCell(1500, ['bgColor'=>'a8d08d'])->addText();
            $table->addCell(2000, ['bgColor'=>'a8d08d'])->addText();
            $table->addCell(500, ['bgColor'=>'a8d08d'])->addText();

            foreach ($subrelat as $value1) {
                if ($value->ind_id == $value1->parent_id) {
                    $table->addRow();
                    $table->addCell(5000)->addText($value1->exind_num_name.$value1->exind_name);
                    $table->addCell(1500)->addText($value1->num2562, null, 'pStyle');
                    $table->addCell(1500)->addText($value1->num2563, null, 'pStyle');
                    $table->addCell(2000)->addText($value1->target2564, null, 'pStyle');
                    if($value1->symbol_name == "วงกลม"){
                        $table->addCell(500)->addText("●",null, 'pStyle');
                    }elseif($value1->symbol_name == "ข้าวหลามตัด"){
                        $table->addCell(500)->addText("◆", null, 'pStyle');
                    }elseif($value1->symbol_name =="ดอกจัน"){
                        $table->addCell(500)->addText("✱", null, 'pStyle');
                    }else{
                         $table->addCell(500)->addText("ฉ", null, 'pStyle');
                    }

                    foreach ($sub_sub as $value2) {
                        if ($value1->exind_id == $value2->exind_id) {
                            $table->addRow();
                            $table->addCell(5000)->addText($value2->ex_side_list_name);
                            $table->addCell(1500)->addText($value2->num2562, null, 'pStyle');
                            $table->addCell(1500)->addText($value2->num2563, null, 'pStyle');
                            $table->addCell(2000)->addText($value2->target2564, null, 'pStyle');
                            $table->addCell(500)->addText();
                        }
                    }
                }
            }
        }

        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $xmlWriter->save("php://output");



    }




































    public function generatedocx_is(){

        $user = auth()->user()->agency_id;
        $relation = new relation();

        // $relat = $relation->getdata('SELECT * FROM indicators INNER JOIN indicator_list ON indicators.ind_name = indicator_list.indicator_list_id  where agency_id ='.$user.' order by indicator_list.indicator_list_id ASC;');

        $relat_is_academic = $relation->getdata('SELECT * FROM indicators where agency_id ='.$user.' ;');
        $subrelat_is_academic = $relation->getdata('select * from exp_indicators ORDER BY exind_name ASC;');

        $agency = $relation->getdata('select * from tsu_agency where agency_id ='.$user.';');

        $sub_sub = $relation->getdata('SELECT *FROM ex_side_lists  ORDER BY ex_side_list_id ASC;');
        // return $agency;


        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $file = 'บันทึกคำรองการปฏิบัติงาน มหาวิทยาลัยทักษิณ ปีการศึกษา 2564.docx';
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');

        $phpWord->setDefaultFontSize(16);
        $phpWord->setDefaultFontName('TH SarabunPSK');
        $section = $phpWord->addSection();
        $cellRowSpan = array('vMerge' => 'restart','bgColor'=>'99ccff','valign'=>'center');
        $cellRowContinue = array('vMerge' => 'continue','valign'=>'center');
        $cellColSpan = array('gridSpan' => 2,'bgColor'=>'99ccff','valign'=>'center');
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addParagraphStyle('pStyle', array('bold'=>true,'align'=>'center'));


        // $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $table = array('borderColor'=>'black', 'borderSize'=> 1);
        $phpWord->addTableStyle('table', $table);

        if($user == '2'){
        $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะเทคโนโลยีและการพัฒนาชุมชน",null,'pStyle');
        }
        elseif($user == '3'){
            $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะนิติศาสตร์",null,'pStyle');
       }
       elseif($user == '4'){
        $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะพยาบาลศาสตร์",null,'pStyle');
}
   elseif($user == '5'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะมนุษยศาสตร์และสังคมศาสตร์",null,'pStyle');
}      elseif($user == '6'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะวิทยาการสุขภาพและการกีฬา",null,'pStyle');
}      elseif($user == '7'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะวิทยาศาสตร์",null,'pStyle');
}      elseif($user == '8'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะวิศวกรรมศาสตร์",null,'pStyle');
}      elseif($user == '9'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะศิลปกรรมศาสตร์",null,'pStyle');
}      elseif($user == '10'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะศึกษาศาสตร์",null,'pStyle');
}      elseif($user == '11'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะเศรษฐศาสตร์และบริหารธุรกิจ",null,'pStyle');
}      elseif($user == '12'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน คณะอุตสาหกรรมเกษตรและชีวภาพ",null,'pStyle');
}      elseif($user == '13'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน วิทยาลัยการจัดการเพื่อการพัฒนา",null,'pStyle');
}      elseif($user == '14'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน วิทยาลัยนานาชาติ",null,'pStyle');
}      elseif($user == '15'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน บัณฑิตวิทยาลัย",null,'pStyle');
}      elseif($user == '16'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สำนักส่งเสริมการบริการวิชาการและภูมิปัญชุมชน",null,'pStyle');
}      elseif($user == '17'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สถาบันทักษิณคดีศึกษา",null,'pStyle');
}      elseif($user == '18'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สถาบันปฏิบัติการชุมชนเพื่อการศึกษาแบบบูรณาการ",null,'pStyle');
}      elseif($user == '19'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สถาบันวิจัยและพัฒนา",null,'pStyle');
}      elseif($user == '20'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สำนักคอมพิวเตอร์",null,'pStyle');
}      elseif($user == '21'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สำนักหอสมุด",null,'pStyle');
}      elseif($user == '22'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายการคลังและทรัพย์สิน",null,'pStyle');
}      elseif($user == '23'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายกิจการนิสิตวิทยาเขตพัทลุง",null,'pStyle');
}      elseif($user == '24'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายกิจการนิสิตวิทยาเขตสงขลา",null,'pStyle');
}      elseif($user == '25'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายตรวจสอบภายใน",null,'pStyle');
}      elseif($user == '26'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายนิติการ",null,'pStyle');
}      elseif($user == '27'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายบริหารกลางและทรัพยากรบุคคล",null,'pStyle');
}      elseif($user == '28'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายบริหารงานสภามหาวิทยาลัย",null,'pStyle');
}      elseif($user == '29'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายบริหารวิทยาเขตพัทลุง",null,'pStyle');
}      elseif($user == '30'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายบริหารวิทยาเขตสงขลา",null,'pStyle');
}      elseif($user == '31'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายประกันคุณภาพการศึกษา",null,'pStyle');
}      elseif($user == '32'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายแผนงาน",null,'pStyle');
}      elseif($user == '33'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายวิชาการ",null,'pStyle');
}      elseif($user == '34'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน งานวิเทศสัมพันธ์",null,'pStyle');
}      elseif($user == '35'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน สำนักบ่มเพาะวิชาการเพื่อวิสาหกิจในชุมชน",null,'pStyle');
} elseif($user == '36'){
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน ฝ่ายสื่อสารองค์กร",null,'pStyle');
}else{
    $section->addText("ตัวชี้วัดคำรับรองการปฏิบัติงาน",null,'pStyle');
}

        $section->addText("มหาวิทยาลัยทักษิณ ประจำปีการศึกษา 2564",null,'pStyle');

        $table = $section->addTable('table');
        $table->addRow(null, array('tblHeader' => true));
        $table->addCell(5000, $cellRowSpan)->addText("ตัวชี้วัด",null,'pStyle');
        // $table->addCell(2000, $cellRowSpan)->addText("");
        $table->addCell(3000, $cellColSpan)->addText("ผลการดำเนินงานย้อนหลัง",null,'pStyle');
        $table->addCell(2000, $cellRowSpan)->addText("ค่าเป้าหมาย 2564",null,'pStyle');

        $table->addRow(null, array('tblHeader' => true));
        // $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(1500,['bgColor'=>'99ccff'])->addText("2562",null,'pStyle');
        $table->addCell(1500,['bgColor'=>'99ccff'])->addText("2563",null,'pStyle');
        $table->addCell(null, $cellRowContinue);


        foreach ($relat_is_academic as $value) {
            $table->addRow();
            $table->addCell(5000,['bgColor'=>'a8d08d'])->addText($value->ind_name,['bold'=>true]);
            $table->addCell(1500,['bgColor'=>'a8d08d'])->addText();
            $table->addCell(1500,['bgColor'=>'a8d08d'])->addText();
            $table->addCell(2000,['bgColor'=>'a8d08d'])->addText();

            foreach ($subrelat_is_academic as $value1) {
                if ($value->ind_id == $value1->parent_id) {
                    $table->addRow();
                    $table->addCell(5000)->addText($value1->exind_name);
                    $table->addCell(1500)->addText($value1->num2562,null,'pStyle');
                    $table->addCell(1500)->addText($value1->num2563,null,'pStyle');
                    $table->addCell(2000)->addText($value1->target2564,null,'pStyle');
                    foreach ($sub_sub as $value2) {
                        if ($value1->exind_id == $value2->exind_id) {
                            $table->addRow();
                            $table->addCell(5000)->addText($value2->ex_side_list_name);
                            $table->addCell(1500)->addText($value2->num2562, null, 'pStyle');
                            $table->addCell(1500)->addText($value2->num2563, null, 'pStyle');
                            $table->addCell(2000)->addText($value2->target2564, null, 'pStyle');
                        }
                    }
                }
            }
        }



        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $xmlWriter->save("php://output");


    }































    public function managedata(){

        return view('adminpage.managedata');
    }







}