<?php

namespace AppBundle\Controller;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\File;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;

class ScholarshipController extends FrontendController
{
    public function defaultAction(Request $request)
    {
        $lang = $request->getLocale();
        $allowedImgExt = array("image/png", "image/jpg", "image/jpeg");
        $allowedFileExt = array("application/pdf");

        if ($request->isMethod('POST')) {
            $data = $request->get('scholarship');
            $name = htmlentities($data['name']);
            $email = htmlentities($data['email']);
            $phone = htmlentities($data['phone']);
            $periode = date("Y");
            $photo = $_FILES['photo']['name'];
            $transcript = $_FILES['transcript']['name'];
            $photoTmp = $_FILES['photo']['tmp_name'];
            $transcriptTmp = $_FILES['transcript']['tmp_name'];
            $photoSize = $_FILES['photo']['size'];
            $photoExt = $_FILES['photo']['type'];
            $transcriptExt = $_FILES['transcript']['type'];

            if ($email != "" && $name != "") {
                if ($photoSize <= 300000 && in_array($photoExt, $allowedImgExt) && in_array($transcriptExt, $allowedFileExt)) {
                    // check for an existing scholarship with this email
                    $scholarship = DataObject\Scholarship::getByPhone($phone, 1);
                    if (!$scholarship) {
                        $scholarship = new DataObject\Scholarship;
                        $filename = File::getValidFilename($phone . "-" . $periode);

                        $scholarship->setParent(DataObject\AbstractObject::getByPath('/Scholarship')); // we store all objects in /Scholarship
                        
                        if($scholarship->getKey() != $filename) {
                            $scholarship->setKey($filename); // the filename of the object
                            $scholarship->setPublished(true); // yep, it should be published :)

                            //creating and saving new asset
                            if ($photo != "") {
                                $asset1 = new Asset();
                                $asset1->setFilename($phone . "-" . $periode);
                                $status1 = move_uploaded_file($photoTmp, tmp . $phone . "-" . $periode);
                                $filePhoto = tmp . $phone . "-" . $periode;
                                if (!$status1) {
                                    // error save
                                } else {
                                    $asset1->setData(file_get_contents($filePhoto));
                                    $asset1->setParent(Asset::getByPath("/Scholarship/Ktp"));
                                    $asset1->save();
                                    unlink($filePhoto);
                                }
                            }
                            if ($transcript != "") {
                                $asset2 = new Asset();
                                $asset2->setFilename($phone . "-" . $periode);
                                $status2 = move_uploaded_file($transcriptTmp, tmp . $phone . "-" . $periode);
                                $fileTranscript = tmp . $phone . "-" . $periode;
                                if (!$status2) {
                                    // error save
                                } else {
                                    $asset2->setData(file_get_contents($fileTranscript));
                                    $asset2->setParent(Asset::getByPath("/Scholarship/Transcript"));
                                    $asset2->save();
                                    unlink($fileTranscript);
                                }
                            }

                            $scholarship->setName($name);
                            $scholarship->setEmail($email);
                            $scholarship->setPhone($phone);
                            $scholarship->setPhone2(htmlentities($data['phone2']));
                            $scholarship->setPhoto($asset1);
                            $scholarship->setUniversityName(htmlentities($data['university']));
                            $scholarship->setNim(htmlentities($data['nim']));
                            $scholarship->setFaculty(htmlentities($data['faculty']));
                            $scholarship->setProgramStudy(htmlentities($data['prodi']));
                            $scholarship->setSemester(htmlentities($data['semester']));
                            $scholarship->setAcademicSemester1(htmlentities($data['academicSemester1']));
                            $scholarship->setIpk1('3.' . htmlentities($data['ipk1']));
                            $scholarship->setAcademicSemester2(htmlentities($data['academicSemester2']));
                            $scholarship->setIpk2('3.' . htmlentities($data['ipk2']));
                            $scholarship->setAcademicSemester3(htmlentities($data['academicSemester3']));
                            $scholarship->setIpk3('3.' . htmlentities($data['ipk3']));
                            $scholarship->setTranscript($asset2);
                            $scholarship->setPeriode($periode);
                            $scholarship->save();

                            return $this->redirect("/{$lang}/csr/success");
                        }
                    } else {
                        $msg_error = $this->get("translator")->trans("scholarship-email-periode");
                    }
                } else {
                    $msg_error = $this->get("translator")->trans("scholarship-file-error");
                }
            } else {
                $msg_error = $this->get("translator")->trans("scholarship-error");
            }
        }
        $this->view->msg_error = $msg_error;
    }

    public function successAction()
    {
        $news = new DataObject\News\Listing();
        $news->setOrderKey("Date");
        $news->setOrder("desc");
        $news->setLimit(4);

        $this->view->news = $news;
    }
}
