<?php
require_once( dirname(__DIR__). '/about-me/PHPMailer-master/src'.'/PHPMailer.php');
use PHPMailer\PHPMailer\PHPMailer;
require dirname(__DIR__). '/about-me/PHPMailer-master/src'.'/Exception.php';




$errors = '';
$errorsgetemail = '';
if($_POST){
    if($_POST['formname']){
        if( $_POST['formname'] == 'Contact' &&  isset($_POST["trap"]) && empty($_POST["trap"])){
            $name = $_POST["name"];
            $useremail = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];
            
            if(empty($name)){
                $errors .= "יש למלא שם <br>";
            }
            if(empty($useremail)){
                $errors .= "יש למלא כתובת אימייל<br> ";
            }
            if(empty($subject)){
                $errors .= "יש למלא נושא<br>";
            }
            if(empty($message)){
                $errors .= "יש למלא את תוכן ההודעה<br>";
            }
            if($errors == ''){
                $email = new PHPMailer();
                $email->CharSet = 'UTF-8';
                $email->Encoding = 'base64';
                $email->addCustomHeader('Content-type:text/html;charset=UTF-8');
                $email->SetFrom($useremail, $name ); //Name is optional
                $email->Subject   = $subject;
                $email->Body      = $message;
                $email->AddAddress( 'toovyashenfeld@gmail.com' );
                //$file_to_attach = 'PATH_OF_YOUR_FILE_HERE';
                //$email->AddAttachment( $file_to_attach , 'NameOfFile.pdf' );
                $email->Send();
                
            }
        }
        if( $_POST['formname'] == 'getcv' &&  isset($_POST["trap"]) && empty($_POST["trap"])){
            $useremail = $_POST["getemail"];
            if(empty($useremail)){
                $errorsgetemail .= "יש למלא כתובת אימייל<br> ";
            }
            if($errorsgetemail == ''){
                
                $subject = 'טוביה שיינפלד - תודה רבה על ההתעניינות שלך בי.';
                $message = "היי לך,";
                $message .= 'בקובץ המצורך תוכל למצוא את קורות חיי.</br>';
                $message .= 'אשמח להפגש כדי לשתף פעולה יחד<br/>';
                $message .= 'בברכה טוביה שיינפלד </br>052-3006338</br>';
                $email = new PHPMailer(true);
                $email->CharSet = 'UTF-8';
                $email->Encoding = 'base64';

                $email->addCustomHeader('Content-type:text/html;charset=UTF-8');


                $email->SetFrom('toovya@outlook.com', 'טוביה שיינפלד' ); //Name is optional
                $email->Subject   = $subject;
                $email->Body      = $message;
                $email->AddAddress( $useremail );
                $file_to_attach = dirname(__DIR__).'/about-me/PDF/';
                $email->AddAttachment( $file_to_attach , 'Toovya_CV.pdf' );
                $email->Send();
                
            }
        }
        
    }
    
   
}
?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php
            if($errors !== '' || $errorsgetemail !== ''){
              echo '<title>נמצאו בשגיאות במילוי הטופס - גש לטופס ותקן אותם </title>';
            } else {
                echo '<title>טוביה שיינפלד</title>';
            }
            
        ?>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="טוביה, שיינפלד, קורות חיים" name="keywords">
        <meta content="טוביה שיינפלד - קורות חיים " name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">טוען...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 sticky-lg-top vh-100">
                    <div class="d-flex flex-column h-100 text-center overflow-auto shadow">
                        <img class="w-100 img-fluid mb-4" src="img/toovya.jpg" alt="Image">
                        <h1 class="text-primary mt-2">טוביה שיינפלד</h1>
                        <div class="mb-4" style="height: 22px;">
                            <h4 class="typed-text-output d-inline-block text-light"></h4>
                            <div class="typed-text d-none">פיתוח אתרי אינטרנט, פיתוח מערכות ווב מורכבות, מומחה לנגישות דיגיטלית</div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto mb-3">
                            <a class="btn btn-secondary btn-square mx-1" aria-label="לדף ה- twitter שלי" target="_blank" href="https://twitter.com/toovyashenfeld"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-secondary btn-square mx-1" aria-label="לדף הפייסבוק שלי" target="_blank" href="https://www.facebook.com/toovya"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-secondary btn-square mx-1" aria-label="לדף ה- linkedin שלי" target="_blank" href="https://www.linkedin.com/in/toovya-shenfeld-85742362/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <div class="d-flex align-items-end justify-content-between border-top">
                            <a href="/about-me/PDF/Toovya CV.pdf" download="" target="_blank" class="btn w-50 border-end">הורדת קורות חיים</a>
                            <a href="#contact" class="btn w-50 btn-scroll">צרו קשר</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- About Start -->
                    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">אודותיי</h1>
                        <p>שמי הוא טוביה שיינפלד. התחלתי את דרכי כמפתח ווב ומהר מאוד התחלתי להתמחות לעולם הנגישות באינטרנט בשנת 2012 בזכות אחותי. אחותי היא אדם עם מוגבלות ולכן עבורי, בחירה בתחום זה שליחות של ממש. לקחתי חלק פעיל בשינויי החקיקה שנעשו בתחום הנגישות ברשת עם הנציבות לשוויון זכויות עבור אנשים עם מוגבלות, משרד המשפטים, איגוד האינטרנט, עמותת נגישות ישראל ומכון התקנים הישראלי. מעבר לכך שימשתי כמשקיף פעיל עבור ת.י 5568  במכון התקנים. </p>
                        <div class="row mb-4">
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">שם מלא:</span> טוביה שיינפלד
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">תאריך לידה:</span> 22/10/1979
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">ניסיון:</span> 10 שנים
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">טלפון:</span> 052-3006338
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">אימייל:</span> toovya@outlook.com
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">מגורים:</span> כפר סבא
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-4 col-lg-6 col-xl-4">
                                <div class="d-flex bg-secondary p-4">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">10</h1>
                                    <div class="pe-3">
                                        <p class="mb-0">שנות</p>
                                        <h5 class="mb-0">ניסיון</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-6 col-xl-4">
                                <div class="d-flex bg-secondary p-4">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">5</h1>
                                    <div class="pe-3">
                                        <p class="mb-0">שפות</p>
                                        <h5 class="mb-0">תיכנות</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-6 col-xl-4">
                                <div class="d-flex bg-secondary p-4">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">3</h1>
                                    <div class="pe-3">
                                        <p class="mb-0">מערכות</p>
                                        <h5 class="mb-0">CMS</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- About End -->

                    <!-- Skills Start -->
                    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">ידע בתיכנות</h1>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="skill mb-4"> <p class="mb-2">HTML</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">מתחיל</p>
                                        <p class="mb-2">מתקדם</p>
                                        <p class="mb-2">מומחה</p>
                                        <p class="mb-2">אלוף</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="skill mb-4"><p class="mb-2">CSS</p>
                                    <div class="d-flex justify-content-between">
                                        
                                        <p class="mb-2">מתחיל</p>
                                        <p class="mb-2">מתקדם</p>
                                        <p class="mb-2">מומחה</p>
                                        <p class="mb-2">אלוף</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="skill mb-4"><p class="mb-2">Javascript</p>
                                    <div class="d-flex justify-content-between">
                                        
                                        <p class="mb-2">מתחיל</p>
                                        <p class="mb-2">מתקדם</p>
                                        <p class="mb-2">מומחה</p>
                                        <p class="mb-2">אלוף</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bgcolor-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="skill mb-4"><p class="mb-2">PHP</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">מתחיל</p>
                                        <p class="mb-2">מתקדם</p>
                                        <p class="mb-2">מומחה</p>
                                        <p class="mb-2">אלוף</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                
                                <div class="skill mb-4"><p class="mb-2">Digital Accessibility Expert</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">מתחיל</p>
                                        <p class="mb-2">מתקדם</p>
                                        <p class="mb-2">מומחה</p>
                                        <p class="mb-2">אלוף</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="skill mb-4"><p class="mb-2">Wordpress</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">מתחיל</p>
                                        <p class="mb-2">מתקדם</p>
                                        <p class="mb-2">מומחה</p>
                                        <p class="mb-2">אלוף</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bgcolor-purple " role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="skill mb-4"><p class="mb-2">Laravel</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">מתחיל</p>
                                        <p class="mb-2">מתקדם</p>
                                        <p class="mb-2">מומחה</p>
                                        <p class="mb-2">אלוף</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="skill mb-4"><p class="mb-2">MS Power Automate</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">מתחיל</p>
                                        <p class="mb-2">מתקדם</p>
                                        <p class="mb-2">מומחה</p>
                                        <p class="mb-2">אלוף</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Skills End -->

                    <!-- Expericence Start -->
                    <section class="expericence py-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">ניסיון תעסוקתי</h1>
                        <div class="border-end border-2 border-light pt-2 pe-5">
                            <div class="position-relative mb-4">
                                <span class="bi bi-arrow-right fs-4 text-light position-absolute" style="top: -5px; right: -50px; transform: rotate(180deg);"></span>
                                <h5 class="mb-1">מנהל מחלקת הנגשת מידע</h5>
                                <p class="mb-2">עמותת נגישות ישראל | <small>2020 - 2022</small></p>
                                <p>המרכז מספק את כל שירותי המרת המידע הן לאתרי אינטרנט והן לבקשת אדם עם מוגבלות כחלק מזכותו לקבל מידע בפורמט נגיש ומותאם למוגבלותו. בנוסף, מספק המרכז שרותי תרגום לשפת הסימנים, תמלול, ויעוץ מקצועי להנגשת כנסים ואירועים.</p>
                                <ul>
                                    <li>ניהול המרכז וקידומו </li>
                                    <li>ניהול אבטחת מידע</li>
                                    <li>פיתוח אוטומציות לייעול העבודה</li>
                                    <li>שדרוג מערכות המחלקה</li>
                                    <li>קשר שוטף מול לקוחות עסקיים, גיוס לקוחות חדשים ושימור לקוחות.</li>
                                    <li>ביצוע הכשרות והדרכות לעובדי המרכז.</li>
                                    <li>ביצוע קורסים בנושא נגישות למפתחים, עורכי תוכן, עיצוב נגיש ועוד.</li>
                                    <li>כתיבת נהלי עבודה</li>
                                    <li>יצירת שיתופי פעולה עם גופים מוסדיים ועסקיים בעלי עניין.</li>
                                    <li>שיפור וייעול מערך הייצור וקביעת יעדים</li>
                                    <li>עמידה בלוחות זמנים ובביקורות</li>
                                </ul>
                            </div>
                            <div class="position-relative mb-4">
                                <span class="bi bi-arrow-right fs-4 text-light position-absolute" style="top: -5px; right: -50px; transform: rotate(180deg);"></span>
                                <h5 class="mb-1">מייסד ומנכ"ל חברת יוזר אקססיביליטי בע"מ</h5>
                                <p class="mb-2"> חברת יוזר אקססיביליטי בע"מ | <small>2020 - 2016</small></p>
                                <p>חברת UA – User Accessibility בע"מ, הינה חברה המתמחה בנגישות ברשת  וברשותה מספר מוצרים ושירותים על מנת לעזור לעסקים לעמוד בתקנות הישראליות. בנוסף החברה מפתחת פתרון ייחודי עבור משתמשי הקצה המיועד להנגיש את כל המרחב האינטרנטי עבורם. החברה קיימת ממאי 2016 ונחשבת לאחת מחמשת החברות הטובות בארץ בתחום הנגישות הדיגיטלית.</p>
                                <ul>
                                    <li>פיתוח רכיבים טכנולוגיים מורכבים מאוד להנגשת אתרי אינטרנט </li>
                                    <li>ייעוץ לחברות גדולות להגשת אתרי האינטרנט.</li>
                                    <li>משקיף פעיל בוועידת המומחים 210107 לעניין התקן באינטרנט במכון התקנים.</li>
                                    <li>הרצאות והדרכות לציבור הרחב.</li>
                                    <li>מרצה ומנהל את צד הטכנולוגי בקורס להנגשת אתרי אינטרנט למתכנתים בשיתוף פעולה עם עמותת נגישות ישראל.</li>
                                </ul>
                            </div>
                            <div class="position-relative mb-4">
                                <span class="bi bi-arrow-right fs-4 text-light position-absolute" style="top: -5px; right: -50px; transform: rotate(180deg);"></span>
                                <h5 class="mb-1">פרילנסר בתחום בניית אתרי אינטרנט</h5>
                                <p class="mb-2">עסק עצמאי | <small>2011 - 2015</small></p>
                                <p>עסקתי בפיתוח אתרי אינטרנט במערכות וורדפרס וג'ומלה.</p>
                                <ul>
                                    <li>התמחות בהנגשת אתרי אינטרנט עבור אנשים עם מוגבלויות. </li>
                                    <li>עבודה מול לקוחות.</li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <!-- Expericence End -->
                    <!-- Subscribe Start -->
                    <section class="wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-secondary text-center p-5">
                            <h1 class="text-white font-weight-bold">הורד קורות חיים</h1>
                           
                            
                                <div class="position-relative w-100">
                                    <a href="/about-me/PDF/Toovya CV.pdf" download="" target="_blank" class="btn w-50 border-end">הורדת קורות חיים</a>
                                </div>
                            
                    </section>
                    <!-- Subscribe End -->

                    <!-- Services Start -->
                    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">תכונות המובילות להצלחה</h1>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="service-item">
                                    <i class="fa fa-2x fa-bullseye mx-auto mb-4"></i>
                                    <h5 class="mb-2">מסירות למשימה</h5>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item">
                                    <i class="fa fa-2x fa-book-reader mx-auto mb-4"></i>
                                    <h5 class="mb-2">למידה עצמית גבוהה</h5>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item">
                                    <i class="fa fa-2x fa-users mx-auto mb-4"></i>
                                    <h5 class="mb-2">עבודה בצוות</h5>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item">
                                    <i class="bi fa fa-2x bi-gear-wide-connected mx-auto mb-4"></i>
                                    <h5 class="mb-2">יכולת הסתגלות מהירה</h5>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item">
                                    <i class="fa fa-2x fa-edit mx-auto mb-4"></i>
                                    <h5 class="mb-2">משמעת עצמית</h5>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item">
                                    <i class="fa fa-2x fa-clock mx-auto mb-4"></i>
                                    <h5 class="mb-2">ניהול זמן</h5>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Services End -->

                    <!-- Portfolio Start -->
                    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">הרצאות קודמות שלי</h1>
                        <div class="row">
                            <div class="col-12">

                                <div class="row portfolio-container">
                                    <div class="col-md-6 mb-4 portfolio-item first">
                                        <div class="position-relative overflow-hidden mb-2">
                                            <img class="img-fluid w-100" src="https://i.ytimg.com/vi/N-LhRVfIlAo/hq720.jpg" alt="עריכת תוכן נגיש טוביה שיינפלד, מומחה User Accessibility, נגישות ישראל">
                                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                                <a target="_blank" href="https://www.youtube.com/watch?v=N-LhRVfIlAo"  class="text-primary">
                                                   <span>עריכת תוכן נגיש טוביה שיינפלד, מומחה User Accessibility, נגישות ישראל</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 portfolio-item second">
                                        <div class="position-relative overflow-hidden mb-2">
                                            <img class="img-fluid w-100" src="https://i.ytimg.com/vi/2PSPagQuHlg/hq720.jpg" alt="טוביה שיינפלד, מנהל קורסים להטמעת נגישות באינטרנט, עמותת נגישות ישראל: נגישות ברכיבי ARIA">
                                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                                <a target="_blank" href="https://www.youtube.com/watch?v=2PSPagQuHlg&ab_channel=TheOpenUniversity" class="text-primary">
                                                    <span> טוביה שיינפלד, מנהל קורסים להטמעת נגישות באינטרנט, עמותת נגישות ישראל: נגישות ברכיבי ARIA</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 portfolio-item first">
                                        <div class="position-relative overflow-hidden mb-2">
                                            <img class="img-fluid w-100" src="https://i.ytimg.com/vi/JC47Ttes8Kg/hqdefault.jpg" alt="טוביה שיינפלד: האתגרים להטמעת נגישות באתרי אינטרנט בישראל">
                                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                                <a target="_blank" class="text-primary" href="https://www.youtube.com/watch?v=JC47Ttes8Kg&ab_channel=BeitIssieShapiro-%D7%91%D7%99%D7%AA%D7%90%D7%99%D7%96%D7%99%D7%A9%D7%A4%D7%99%D7%A8%D7%90"  class="text-primary">
                                                    <span>טוביה שיינפלד: האתגרים להטמעת נגישות באתרי אינטרנט בישראל</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 portfolio-item second">
                                        <div class="position-relative overflow-hidden mb-2">
                                            <img class="img-fluid w-100" src="https://i.ytimg.com/vi/UH4MF2l6lqc/hq720.jpg" alt="טוביה שיינפלד - הרצאה בכנס נגישות של עמותת נגישות ישראל">
                                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                                <a target="_blank" class="text-primary" href="https://www.youtube.com/watch?v=UH4MF2l6lqc&ab_channel=%D7%98%D7%95%D7%91%D7%99%D7%94%D7%A9%D7%99%D7%99%D7%A0%D7%A4%D7%9C%D7%93" >
                                                    <span>טוביה שיינפלד - הרצאה בכנס נגישות של עמותת נגישות ישראל</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 portfolio-item second">
                                        <div class="position-relative overflow-hidden mb-2">
                                            <img class="img-fluid w-100" src="https://i.ytimg.com/vi/TbELsZA0TMs/hqdefault.jpg" alt="כל מה שרציתם לשאול על נגישות - פאנל שאלות מהקהל בהשתתפות אלון זכאי, טוביה שיינפלד, אילנה בניש ">
                                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                                <a target="_blank" class="text-primary" href="https://www.youtube.com/watch?v=TbELsZA0TMs&list=PLgxBiVi6W-CdtJ0w5YdVpLtF9g11rH_SV&index=1&ab_channel=%D7%90%D7%99%D7%92%D7%95%D7%93%D7%94%D7%90%D7%99%D7%A0%D7%98%D7%A8%D7%A0%D7%98%D7%94%D7%99%D7%A9%D7%A8%D7%90%D7%9C%D7%99ISOC-IL" >
                                                    <span> כל מה שרציתם לשאול על נגישות - פאנל שאלות מהקהל בהשתתפות אלון זכאי, טוביה שיינפלד, אילנה בניש</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Portfolio End -->

                    <!-- Testimonial Start -->
                    <!--section class="testimonial py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">Testimonial</h1>
                        <div class="owl-carousel testimonial-carousel">
                            <div class="text-left">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <p class="fs-4 mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet accusam amet eirmod eos, labore diam clita</p>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid" src="img/testimonial-1.jpg" style="width: 60px; height: 60px;">
                                    <div class="pe-3">
                                        <p class="text-primary fs-5 mb-1">Client Name</p>
                                        <i>Profession</i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <p class="fs-4 mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet accusam amet eirmod eos, labore diam clita</p>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid" src="img/testimonial-2.jpg" style="width: 60px; height: 60px;">
                                    <div class="pe-3">
                                        <p class="text-primary fs-5 mb-1">Client Name</p>
                                        <i>Profession</i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <p class="fs-4 mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet accusam amet eirmod eos, labore diam clita</p>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid" src="img/testimonial-3.jpg" style="width: 60px; height: 60px;">
                                    <div class="pe-3">
                                        <p class="text-primary fs-5 mb-1">Client Name</p>
                                        <i>Profession</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section -->
                    <!-- Testimonial End -->

                    <!-- Contact Start -->
                    <section class="py-5 wow fadeInUp" data-wow-delay="0.1s" id="contact">
                        <h1 class="title pb-3 mb-5">צרו קשר</h1>
						<p class="mb-4">
                        <?php 
                            if($errors !== ''){
                                echo '<h2>נמצאו בשגיאות במילוי הטופס:</h2>';
                                echo $errors;
                            }
                        ?>
                        </p>
                        <form action="" method="post" >
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 bg-secondary" id="name" name="name" placeholder=" ">
                                        <label for="name">שמך:</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0 bg-secondary" id="email" name="email" placeholder=" ">
                                        <label for="email">כתובת אימייל לחזרה:</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 bg-secondary" id="subject" name="subject" placeholder=" ">
                                        <label for="subject">נושא:</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0 bg-secondary"  id="message" name="message" style="height: 200px" placeholder=" "></textarea>
                                        <label for="message">תוכן ההודעה</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control border-0 bg-secondary" id="subject" style="display:none;" name="trap" >
                                    <input type="hidden" name="formname" value="Contact"/>
                                    <button class="btn btn-primary w-100 py-3" type="submit">שלח</button>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- Contact End -->

                    <!-- Footer Start -->
                    <section class="wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-secondary text-light text-center p-5">
                            <div class="d-flex justify-content-center mb-4">


                                <a class="btn btn-dark btn-square mx-1" aria-label="לדף ה- twitter שלי" target="_blank" href="https://twitter.com/toovyashenfeld"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-dark btn-square mx-1" aria-label="לדף הפייסבוק שלי" target="_blank" href="https://www.facebook.com/toovya"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-dark btn-square mx-1" aria-label="לדף ה- linkedin שלי" target="_blank" href="https://www.linkedin.com/in/toovya-shenfeld-85742362/"><i class="fab fa-linkedin-in"></i></a>
    
                            </div>
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							<p class="m-0">&copy; All Rights Reserved. Designed by <a href="https://htmlcodex.com">HTML Codex</a></p>
                        </div>
                    </section>
                    <!-- Footer End -->
                </div>
            </div>
        </div>

        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/typed/typed.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
