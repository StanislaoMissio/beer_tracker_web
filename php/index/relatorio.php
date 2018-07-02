<!DOCTYPE html>
<html lang="en">
<?php require_once('../utils/init.php');?>
  <body>
    <main role="main">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#RL01">Relátorio 1</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#RL02">Relátorio 2</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#RL03">Relátorio 3</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#RL04">Relátorio 4</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#RL05">Relátorio 5</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#RL06">Relátorio 6</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="RL01" class="container tab-pane active"><br>
                        <div id="relatorio_1"></div>
                    </div>
                    <div id="RL02" class="container tab-pane fade"><br>
                        <div id="relatorio_2"></div>
                    </div>
                    <div id="RL03" class="container tab-pane fade"><br>
                        <div id="relatorio_3"></div>
                    </div>
                    <div id="RL04" class="container tab-pane fade"><br>
                        <div id="relatorio_4"></div>
                    </div>
                    <div id="RL05" class="container tab-pane fade"><br>
                        <div id="relatorio_5"></div>
                    </div>
                    <div id="RL06" class="container tab-pane fade"><br>
                        <div id="relatorio_6"></div>
                    </div>
        </main>
    <script src="/dist/js/relatorio.js"></script>
  </body>
</html>
