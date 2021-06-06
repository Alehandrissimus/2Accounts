<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Хороший фронт</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="./front/css/style.css">
</head>

<body>
  <header>
    <!-- Image and text -->
    <nav class="navbar navbar-light opu">
        <img src="./front/img/gerb_main.png" width="30" height="30" class="d-inline-block align-top" alt="gerb_duop">
    </nav>
  </header>

  <section>
    <div class="container-fluid">
      <div class="row">
        <!-- sidebar -->
        <div class="col-sm-2">
          <div class="accordion" id="accordionExample">
            <!-- ІКС -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  ІКС
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Прикладная математика</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Инженерия программного обеспечения</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked('first')">Информационные управляющие системы</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked('АІ')">Компьютерные науки</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Компьютерный дизайн</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Компьютерные системы и сети</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Информационные системы и технологии</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ІБЕІТ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  ІБЕІТ
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Економика</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Экономика предприятия</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Экономическая кибернетика</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Компьютерные и информационные технологии в экономической деятельности</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Прикладная экономика</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Учет и налогообложение</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Учет и контроль в гостинично-ресторанном бизнесе</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ІІБРТ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  ІІБРТ
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Информационные технологии глобальных и локальных комъютерних сетей</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Компьютерные науки и информационная безопасность</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Программное обеспечение систем защиты информации</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Kибербезопасность</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Социальная инженерия</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Электроника</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ІМІ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  ІМІ
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Физическая культура</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Компьютерная химия и молекулярное моделирование</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Биомедицинская инженерия</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ГФ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  ГФ
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Истории национальных сообществ Юга и Юго-Запада Украины</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">История и археология</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Региональные истории Украины</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Информационная деятельность</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Философия культуры Востока</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Культурология</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- УІІ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  УІІ
                </button>
              </h2>
              <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Информационная деятельность</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Культурология</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Экономика предприятия</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Экономическая кибернетика</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Журналистика</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Психология</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ІЕЕ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                  ІЕЕ
                </button>
              </h2>
              <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Программное обеспечение встроенных и мобильных систем</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Машины и электрический транспорт</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Электроэнергетика, электротехника и электромеханика</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Электромеханические системы автоматизации и электропривод</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Электроснабжение и энергетический менеджмент</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Инженерия разумных электротехнических систем</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ІПТДМ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                  ІПТДМ
                </button>
              </h2>
              <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Архитектурный дизайн</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Информационные технологии проектирования</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Компьютерное проектирование и дизайн машин</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Технология машиностроения и программирования оборудования</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Материаловедение и инженерия поверхности</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Метрология и менеджмент качества</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ХТФ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingNinth">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNinth" aria-expanded="false" aria-controls="collapseNinth">
                  ХТФ
                </button>
              </h2>
              <div id="collapseNinth" class="accordion-collapse collapse" aria-labelledby="headingNinth" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Химические технологии органических веществ</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Технологии фармацевтических препаратов</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Фармация</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- УНІ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTenth">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTenth" aria-expanded="false" aria-controls="collapseTenth">
                  УНІ
                </button>
              </h2>
              <div id="collapseTenth" class="accordion-collapse collapse" aria-labelledby="headingTenth" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Информационная деятельность</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Культурология</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Германские языки и литературы (перевод включительно), первая - английский</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Экономика предприятия</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Экономическая кибернетика</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Психология</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ІЕКСУ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwelfth">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelfth" aria-expanded="false" aria-controls="collapseTwelfth">
                  ІЕКСУ
                </button>
              </h2>
              <div id="collapseTwelfth" class="accordion-collapse collapse" aria-labelledby="headingTwelfth" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Экологическая безопасность</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Дозиметрия и радиационная безопасность</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Физика ядра и физика высоких энергий</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Атомная энергетика</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Радиационный контроль и мониторинг на атомных электростанциях</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ІМБТ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThirteenth">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteenth" aria-expanded="false" aria-controls="collapseThirteenth">
                  ІМБТ
                </button>
              </h2>
              <div id="collapseThirteenth" class="accordion-collapse collapse" aria-labelledby="headingThirteenth" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Радиационный контроль и мониторинг на атомных электростанциях</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Инженерия логистических систем</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Мехатроника и промышленные роботы</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Автоспортивный инжиниринг</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Колесные и гусеничные транспортные средства</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Компьютерное проектирование и диагностика колесных транспортных средств</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ІШІР -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFourteenth">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteenth" aria-expanded="false" aria-controls="collapseFourteenth">
                  ІШІР
                </button>
              </h2>
              <div id="collapseFourteenth" class="accordion-collapse collapse" aria-labelledby="headingFourteenth" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Интеллектуальный анализ данных</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Управление ИТ-проектами</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Программируемые мобильные системы</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Специализированные компьютерные системы</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ІДЗО -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFifteenth">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteenth" aria-expanded="false" aria-controls="collapseFifteenth">
                  ІДЗО
                </button>
              </h2>
              <div id="collapseFifteenth" class="accordion-collapse collapse" aria-labelledby="headingFifteenth" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Информационная деятельность</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Культурология</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Экономика предприятия</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Экологическая безопасность</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Компьютерный дизайн</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Кибербезопасность</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- УПІ -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSixteenth">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixteenth" aria-expanded="false" aria-controls="collapseSixteenth">
                  УПІ
                </button>
              </h2>
              <div id="collapseSixteenth" class="accordion-collapse collapse" aria-labelledby="headingSixteenth" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Информационная деятельность</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Подъемно-транспортные, строительные, дорожные машины и оборудование</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Автоспортивный инжиниринг</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Мехатроника и промышленные роботы</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Специализированные компьютерные системы</button>
                    <button type="button" class="list-group-item list-group-item-action truncate" onclick="showUnlinked()">Компьютерные науки</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- close sidebar -->
          
        <!-- view -->
        <div class="col">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner center" id='carousel'></div>
            
          </div>
          <div class="container">
              <div class="row">
                <div class="col-sm"></div>
                <div class="col-sm-7 d-flex justify-content-evenly">
                  <button type="button" class="btn btn-outline-primary" onclick="editAccount()">Отметить</button>
                  <button type="button" class="btn btn-outline-success" onclick="linkAccount()">Связать</button>
                </div>
                <div class="col-sm"></div>
              </div>
            </div>
        </div>
        
        <!-- close view -->
      </div>

    </div>
  </section>
  <!-- end section -->

  <!-- just scripts, don't take care -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script src="./script.js"></script>
</body>
</html>