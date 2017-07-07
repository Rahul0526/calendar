<?php include_once 'header.php'; ?>
<div class="row-border home-row">
  <section>
    <div class="col-md-30"><hr class="colorgraph"></div>
    <div class="heading-title col-md-20">
      Stock That Are Down For The Period
    </div>
    <div class="col-md-30"><hr class="colorgraph"></div>
  </section>

  <section class="container">
  
    <div class="row">
      <h2 class="text-center text-bold"><a href="<?=site_url('plan')?>" class="text-primary">7,000+ Stocks And ETFs.  We Have Many Charts, And Will Build At Your request.
          <br>Save Charts Or Create A Portfolio To Follow Your Favorite.START FREE TRIAL NOW  </a></h2>
      <div class="col-md-16">
        <!-- AREA CHART -->
        <div class="panel panel-default">
          <div class="panel-heading with-border">
            <h3 class="panel-title">Day Ending </h3>
            <?= date('m/d/Y'); ?>
          </div>
          <div class="panel-body">
            <table class=" dataTable display customTable" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Symbol</th>
                  <th>$</th>
                  <th>%</th>
                </tr>
              </thead>
<!--                <tbody>     
              <tr role="row" class="odd">
                  <td>INTG</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="even">
                  <td>EUSC</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="odd">
                  <td>HSCZ</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="even">
                  <td>NWFL</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>EOS</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>TGP</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>KEX</td>
                  <td>$-0.04</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>NSAM</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>SIZ</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>NAII</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>MGYR</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>APLE</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>RALS</td>
                  <td>$-0.04</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>HEWG</td>
                  <td>$-0.03</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>TTGT</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>SCS</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>SRTS</td>
                  <td>$-0.01</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>HUM</td>
                  <td>$-0.29</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>CACB</td>
                  <td>$-0.01</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>SLIM</td>
                  <td>$-0.05</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>QEH</td>
                  <td>$-0.06</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>SWKS</td>
                  <td>$-0.17</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>IFEU</td>
                  <td>$-0.09</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>QQXT</td>
                  <td>$-0.1</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>EWU</td>
                  <td>$-0.04</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>PGJ</td>
                  <td>$-0.08</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="odd">
                  <td>ADUS</td>
                  <td>$-0.06</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>PMT</td>
                  <td>$-0.04</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="odd">
                  <td>HEVY</td>
                  <td>$-0.07</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>IX</td>
                  <td>$-0.2</td>
                  <td>-0.003%</td>
                </tr></tbody>
            -->
              <tbody>
                <?php
                foreach ($dayEnding as $row){?>
                <tr>
                  <td><?=$row->ticker?></td>
                  <td>$<?=round($row->price_change_day,3)?></td>
                  <td><?=round($row->percent_change_day,3)?>%</td>
                </tr>
                <?php }?>
              
              </tbody>
            </table>
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->
                
        <!-- DONUT CHART -->
      </div><!-- /.col (LEFT) -->
      <div class="col-md-16">
        <div class="panel panel-default">
          <div class="panel-heading with-border">
            <h3 class="panel-title">Week Ending </h3>
            <?= date('m/d/Y', strtotime('next Saturday')); ?>
          </div>
          <div class="panel-body">
            <table class=" dataTable display customTable" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Symbol</th>
                  <th>$</th>
                  <th>%</th>
                </tr>
              </thead>
<!--                <tbody>     
              <tr role="row" class="odd">
                  <td>INTG</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="even">
                  <td>EUSC</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="odd">
                  <td>HSCZ</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="even">
                  <td>NWFL</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>EOS</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>TGP</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>KEX</td>
                  <td>$-0.04</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>NSAM</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>SIZ</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>NAII</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>MGYR</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>APLE</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>RALS</td>
                  <td>$-0.04</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>HEWG</td>
                  <td>$-0.03</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>TTGT</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>SCS</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>SRTS</td>
                  <td>$-0.01</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>HUM</td>
                  <td>$-0.29</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>CACB</td>
                  <td>$-0.01</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>SLIM</td>
                  <td>$-0.05</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>QEH</td>
                  <td>$-0.06</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>SWKS</td>
                  <td>$-0.17</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>IFEU</td>
                  <td>$-0.09</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>QQXT</td>
                  <td>$-0.1</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>EWU</td>
                  <td>$-0.04</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>PGJ</td>
                  <td>$-0.08</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="odd">
                  <td>ADUS</td>
                  <td>$-0.06</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>PMT</td>
                  <td>$-0.04</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="odd">
                  <td>HEVY</td>
                  <td>$-0.07</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>IX</td>
                  <td>$-0.2</td>
                  <td>-0.003%</td>
                </tr></tbody>
            -->
              <tbody>
                <?php
                foreach ($weekEnding as $row){?>
                <tr>
                  <td><?=$row->ticker?></td>
                  <td>$<?=round($row->price_change_week,3)?></td>
                  <td><?=round($row->percent_change_week,3)?>%</td>
                </tr>
                <?php }?>
              
              </tbody>
            </table>
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->
      </div><!-- /.col (RIGHT) -->
      <div class="col-md-16">
        <!-- AREA CHART -->
        <div class="panel panel-default">
          <div class="panel-heading with-border">
            <h3 class="panel-title">Month Ending  </h3>
             <?= date('m/t/Y');?>
          </div>
          <div class="panel-body">
            <table class=" dataTable display customTable" cellspacing="0" width="100%">
              <thead>
                <tr>
                   <th>Symbol</th>
                  <th>$</th>
                  <th>%</th>
                </tr>
              </thead>
<!--                <tbody>     
              <tr role="row" class="odd">
                  <td>INTG</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="even">
                  <td>EUSC</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="odd">
                  <td>HSCZ</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="even">
                  <td>NWFL</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>EOS</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>TGP</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>KEX</td>
                  <td>$-0.04</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>NSAM</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>SIZ</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>NAII</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>MGYR</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>APLE</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>RALS</td>
                  <td>$-0.04</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>HEWG</td>
                  <td>$-0.03</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>TTGT</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>SCS</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>SRTS</td>
                  <td>$-0.01</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>HUM</td>
                  <td>$-0.29</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>CACB</td>
                  <td>$-0.01</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>SLIM</td>
                  <td>$-0.05</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>QEH</td>
                  <td>$-0.06</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>SWKS</td>
                  <td>$-0.17</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>IFEU</td>
                  <td>$-0.09</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>QQXT</td>
                  <td>$-0.1</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>EWU</td>
                  <td>$-0.04</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>PGJ</td>
                  <td>$-0.08</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="odd">
                  <td>ADUS</td>
                  <td>$-0.06</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>PMT</td>
                  <td>$-0.04</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="odd">
                  <td>HEVY</td>
                  <td>$-0.07</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>IX</td>
                  <td>$-0.2</td>
                  <td>-0.003%</td>
                </tr></tbody>-->
            
            <tbody>
                <?php
                foreach ($monthEnding as $row){?>
                <tr>
                  <td><?=$row->ticker?></td>
                  <td>$<?=round($row->price_change_month,3)?></td>
                  <td><?=round($row->percent_change_month,3)?>%</td>
                </tr>
                <?php }?>
              
              </tbody>
            </table>
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->

        <!-- DONUT CHART -->


      </div><!-- /.col (LEFT) -->
      <div class="col-md-16">
        <div class="panel panel-default">
          <div class="panel-heading with-border">
            <h3 class="panel-title">Quarter Ending</h3>
            <?php
            $current_quarter = ceil(date('n') / 3);
            echo date('m/t/Y', strtotime(date('Y') . '-' . (($current_quarter * 3)) . '-1'));
            ?>
          </div>
          <div class="panel-body">
            <table class=" dataTable display customTable" cellspacing="0" width="100%">
              <thead>
                <tr>
                   <th>Symbol</th>
                  <th>$</th>
                  <th>%</th>
                </tr>
              </thead>
<!--                <tbody>     
              <tr role="row" class="odd">
                  <td>INTG</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="even">
                  <td>EUSC</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="odd">
                  <td>HSCZ</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="even">
                  <td>NWFL</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>EOS</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>TGP</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>KEX</td>
                  <td>$-0.04</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>NSAM</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>SIZ</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>NAII</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>MGYR</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>APLE</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>RALS</td>
                  <td>$-0.04</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>HEWG</td>
                  <td>$-0.03</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>TTGT</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>SCS</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>SRTS</td>
                  <td>$-0.01</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>HUM</td>
                  <td>$-0.29</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>CACB</td>
                  <td>$-0.01</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>SLIM</td>
                  <td>$-0.05</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>QEH</td>
                  <td>$-0.06</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>SWKS</td>
                  <td>$-0.17</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>IFEU</td>
                  <td>$-0.09</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>QQXT</td>
                  <td>$-0.1</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>EWU</td>
                  <td>$-0.04</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>PGJ</td>
                  <td>$-0.08</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="odd">
                  <td>ADUS</td>
                  <td>$-0.06</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>PMT</td>
                  <td>$-0.04</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="odd">
                  <td>HEVY</td>
                  <td>$-0.07</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>IX</td>
                  <td>$-0.2</td>
                  <td>-0.003%</td>
                </tr></tbody>
            -->
              <tbody>
                <?php
                foreach ($quarterEnding as $row){?>
                <tr>
                  <td><?=$row->ticker?></td>
                  <td>$<?=round($row->price_change_quarter,3)?></td>
                  <td><?=round($row->percent_change_quarter,3)?>%</td>
                </tr>
                <?php }?>
              
              </tbody>
            </table>
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->
      </div><!-- /.col (RIGHT) -->
      <div class="col-md-16">
        <!-- AREA CHART -->
        <div class="panel panel-default">
          <div class="panel-heading with-border">
            <h3 class="panel-title">Year Ending</h3>
              12/31/<?= date('Y'); ?>
          </div>
          <div class="panel-body">
            <table class=" dataTable display customTable" cellspacing="0" width="100%">
              <thead>
                <tr>
                   <th>Symbol</th>
                  <th>$</th>
                  <th>%</th>
                </tr>
              </thead>
<!--                <tbody>     
              <tr role="row" class="odd">
                  <td>INTG</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="even">
                  <td>EUSC</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="odd">
                  <td>HSCZ</td>
                  <td>$-0.01</td>
                  <td>-0%</td>
                </tr><tr role="row" class="even">
                  <td>NWFL</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>EOS</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>TGP</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>KEX</td>
                  <td>$-0.04</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>NSAM</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>SIZ</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>NAII</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>MGYR</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>APLE</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>RALS</td>
                  <td>$-0.04</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>HEWG</td>
                  <td>$-0.03</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>TTGT</td>
                  <td>$-0.01</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="even">
                  <td>SCS</td>
                  <td>$-0.02</td>
                  <td>-0.001%</td>
                </tr><tr role="row" class="odd">
                  <td>SRTS</td>
                  <td>$-0.01</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>HUM</td>
                  <td>$-0.29</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>CACB</td>
                  <td>$-0.01</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>SLIM</td>
                  <td>$-0.05</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>QEH</td>
                  <td>$-0.06</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>SWKS</td>
                  <td>$-0.17</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>IFEU</td>
                  <td>$-0.09</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="even">
                  <td>QQXT</td>
                  <td>$-0.1</td>
                  <td>-0.002%</td>
                </tr><tr role="row" class="odd">
                  <td>EWU</td>
                  <td>$-0.04</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>PGJ</td>
                  <td>$-0.08</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="odd">
                  <td>ADUS</td>
                  <td>$-0.06</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>PMT</td>
                  <td>$-0.04</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="odd">
                  <td>HEVY</td>
                  <td>$-0.07</td>
                  <td>-0.003%</td>
                </tr><tr role="row" class="even">
                  <td>IX</td>
                  <td>$-0.2</td>
                  <td>-0.003%</td>
                </tr></tbody>-->
            
              <tbody>
                <?php
                foreach ($yearEnding as $row){?>
                <tr>
                  <td><?=$row->ticker?></td>
                  <td>$<?=round($row->price_change_year,3)?></td>
                  <td><?=round($row->percent_change_year,3)?>%</td>
                </tr>
                <?php }?>
              
              </tbody>
            </table>
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->

        <!-- DONUT CHART -->


      </div><!-- /.col (LEFT) -->

    </div><!-- /.row -->
  </section>
</div>

<div class="row-border home-row">
  <section>
    <div class="col-md-30"><hr class="colorgraph"></div>
    <div class="heading-title col-md-20">
      Stocks Price Data     
    </div>
    <div class="col-md-30"><hr class="colorgraph"></div>
  </section>

  <section class="container">
    <div class="row">
      <div class="col-md-80">
      
        <h2 class="text-center text-bold"><a href="<?=site_url('plan')?>" class="text-primary">7,000+ Stocks And ETFs.  We Have Many Charts, And Will Build At Your request.
           <br> Save Charts Or Create A Portfolio To Follow Your Favorite.START FREE TRIAL NOW  </a></h2>
       
        <!-- LINE CHART -->
         
        <div class="panel panel-default">
        
          <div class="panel-body">
          
<!--            <div class="chart">
              <canvas id="lineChart" data-x=" 2012-05-09,2012-05-08,2012-05-07,2012-05-04,2012-05-03,2012-05-02,2012-05-01,2012-04-30,2012-04-27,2012-04-26,2012-04-25,2012-04-24,2012-04-23,2012-04-20,2012-04-19,2012-04-18,2012-04-17,2012-04-16,2012-04-13,2012-04-12,2012-04-11,2012-04-10,2012-04-09,2012-04-05,2012-04-04,2012-04-03,2012-04-02,2012-03-30,2012-03-29,2012-03-28" data-y=" 2.78,2.78,2.77,2.77,2.79,2.84,2.84,2.82,2.77,2.78,2.81,2.78,2.84,2.83,2.81,2.80,2.82,2.78,2.80,2.81,2.78,2.76,2.76,2.76,2.77,2.71,2.77,2.76,2.73,2.67" data-label="Ticker AAME" ></canvas>
            </div>-->
<div class="chart">
  <div class="col-md-30 pull-right filter-label"><span>Daily</span><span>Weekly</span><span>Monthly</span><span>Quarterly</span><span>Yearly</span></div>
              <canvas id="lineChart"  data-x=" <?= implode(",", $stackChart['date']) ?>" data-y=" <?= implode(",", $stackChart['val']) ?>" data-label="Ticker <?= $stackChart['label'] ?>"></canvas> 
            </div>
           
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->

      </div><!-- /.col (RIGHT) -->
    </div><!-- /.row -->
  </section>
</div>

<div class="row-border home-row">
  <section>
    <div class="col-md-30"><hr class="colorgraph"></div>
    <div class="heading-title col-md-20">
      Statistics And Key Metrics
    </div>
    <div class="col-md-30"><hr class="colorgraph"></div>
  </section>

  <section class="container">
    <div class="row">
      <div class="col-md-80">
        <h2 class="text-center text-bold"><a href="<?=site_url('plan')?>" class="text-primary">7,000+ Stocks And ETFs.  We Have Many Charts, And Will Build At Your request.
           <br> Save Charts Or Create A Portfolio To Follow Your Favorite.START FREE TRIAL NOW  </a></h2>
        <!-- AREA CHART -->
        <div class="panel ">

          <div class="panel-body">
            <table class="dataTable2 display table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                   <tr>
                                    <th style="width: 200px!important;">COMPANY</th>
                                    <th>TICKER</th>
                                    <th>SECTOR</th>
                                    <th>INDUSTRY</th>
                                    <th>MARKET
                                      CAP</th>
                                    <th>P/E</th>
                                    <th>PRICE
                                      SALES</th>
                                    <th>PRICE
                                      BOOK</th>
                                    <th>PRICE
                                      CASH</th>
                                    <th>EPS</th>
                                    <th>SHORT
                                      RATIO</th>
                                    <th>ROE</th>
                                    <th>CURRENT</th>
                                    <th>QUICK</th>
                                    <th>DEBT
                                      EQUITY</th>
                                    <th>GROSS
                                      Margin</th>
                                    <th>ADJ
                                      CLOSE</th>
                                    <th>PRICE GROUP</th>
                                  </tr>
                </tr>
              </thead>
              <tbody>
                <?php foreach($companyData as $row){?>
                <tr>
                  <td><?=$row->company?></td>
                    <td><?=$row->ticker?></td>
                     <td><?=$row->sector?></td>
                      <td><?=$row->industry?></td>
                       <td><?=$row->market_cap?></td>
                       <td><?=$row->price_earnings?></td>
                       <td><?=$row->price_sales?></td>
                       <td><?=$row->price_book?></td>
                       <td><?=$row->price_cash?></td>
                       <td><?=$row->eps?></td>
                       <td><?=$row->short_ratio?></td>
                       <td><?=$row->roe?></td>
                       <td><?=$row->current?></td>
                       <td><?=$row->quick?></td>
                       <td><?=$row->debt_equity?></td>
                       <td><?=$row->gross_m?></td>
                       <td><?=$row->adj_close?></td>
                       <td><?=$row->price_group?></td>
                </tr>
                <?php }?>                
              </tbody>
            </table>
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->
      </div><!-- /.col (LEFT) -->

    </div><!-- /.row -->
  </section>
</div>

<div class="row-border home-row">
  
  <div class="col-md-35">
    <div class="row-border">
      <section>
        <div class="col-md-20"><hr class="colorgraph"></div>
        <div class="heading-title col-md-40">
          Earnings & Ratings
        </div>
        <div class="col-md-20"><hr class="colorgraph"></div>
      </section>
    </div>
  </div>
   <div class="col-md-45">
    <div class="row-border">
      <section>
        <div class="col-md-20"><hr class="colorgraph"></div>
        <div class="heading-title col-md-40">
          Dollar($) & Percent(%) Changes
        </div>
        <div class="col-md-20"><hr class="colorgraph"></div>
      </section>
    </div>
   </div>
  
  
</div>
<div class="row-border home-row">
  <div class="row-border">
      <section class="container">
   <h2 class="text-center text-bold"><a href="<?=site_url('plan')?>" class="text-primary">7,000+ Stocks And ETFs.  We Have Many Charts, And Will Build At Your request.
       <br>Save Charts Or Create A Portfolio To Follow Your Favorite.START FREE TRIAL NOW  </a></h2>
  <div class="col-md-35">   
        
          <div class="col-md-80 no-padding no-margin">
            <!-- AREA CHART -->
            <div class="panel panel-default">

              <div class="panel-body">
                <table class=" dataTable2 display table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th style="width: 250px!important;">Company</th>
                      <th>Earnings</th>
                      <th>Target Price</th>
                      <th>Analyst</th>
                    </tr>
                  </thead>
              <tbody>
                     <?php foreach($companyData as $row){?>
                <tr>
                  
                   <td><?=$row->company?></td>
                   <td><?=$row->earnings?></td>
                   <td><?=$row->target_price?></td>
                   <td><?=$row->recommendation?></td>
                </tr>
                     <?php }?>
              </tbody>
                </table>
              </div><!-- /.panel-body -->
            </div><!-- /.panel -->

          </div><!-- /.col (LEFT) -->

  </div>

  <div class="col-md-45">
          <div class="col-md-80 no-padding no-margin">
            <!-- AREA CHART -->
            <div class="panel panel-default">
              <div class="panel-body">
                <table class=" dataTable2 display table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th>% Day</th>
                      <th>$ Day</th>
                      <th>% Week</th>
                      <th>$ Week</th>
                      <th>% Month</th>
                      <th>$ Month</th>
                      <th>% Quarter</th>
                      <th>$ Quarter</th>
                      <th>% Year</th>
                      <th>$ Year</th>
                    </tr>
                  </thead>
                    <tbody>
                <tr role="row" class="odd">
                      <td>BRK-A</td>                    
                      <td>0%</td>
                      <td>$-959.00</td>                     
                      <td>-0.003%</td>
                      <td>$-710.00</td>                     
                      <td>0.025%</td>
                      <td>$5500.00</td>                      
                      <td>0.026%</td>
                      <td>$5619.00</td>                     
                      <td>0.139%</td>
                      <td>$27040.00</td>
                    </tr><tr role="row" class="even">
                      <td>AZO</td>                    
                      <td>-0.03%</td>
                      <td>$-19.58</td>                     
                      <td>-0.051%</td>
                      <td>$-40.19</td>                     
                      <td>-0.077%</td>
                      <td>$-62.65</td>                      
                      <td>-0.053%</td>
                      <td>$-42.49</td>                     
                      <td>0.028%</td>
                      <td>$20.47</td>
                    </tr><tr role="row" class="odd">
                      <td>GHC</td>                    
                      <td>-0.02%</td>
                      <td>$-8.96</td>                     
                      <td>-0.026%</td>
                      <td>$-13.39</td>                     
                      <td>0.003%</td>
                      <td>$1.71</td>                      
                      <td>0.042%</td>
                      <td>$20.49</td>                     
                      <td>0.063%</td>
                      <td>$30.08</td>
                    </tr><tr role="row" class="even">
                      <td>ACET</td>                    
                      <td>-0.22%</td>
                      <td>$-5.53</td>                     
                      <td>-0.17%</td>
                      <td>$-4.14</td>                     
                      <td>-0.216%</td>
                      <td>$-5.56</td>                      
                      <td>-0.08%</td>
                      <td>$-1.75</td>                     
                      <td>-0.238%</td>
                      <td>$-6.31</td>
                    </tr><tr role="row" class="odd">
                      <td>BH</td>                    
                      <td>-0.01%</td>
                      <td>$-5.14</td>                     
                      <td>-0.005%</td>
                      <td>$-2.16</td>                     
                      <td>0.085%</td>
                      <td>$35.20</td>                      
                      <td>0.113%</td>
                      <td>$45.85</td>                     
                      <td>0.38%</td>
                      <td>$123.86</td>
                    </tr><tr role="row" class="even">
                      <td>ASR</td>                    
                      <td>-0.03%</td>
                      <td>$-5.05</td>                     
                      <td>-0.048%</td>
                      <td>$-7.69</td>                     
                      <td>0.004%</td>
                      <td>$0.58</td>                      
                      <td>-0.035%</td>
                      <td>$-5.50</td>                     
                      <td>0.105%</td>
                      <td>$14.61</td>
                    </tr><tr role="row" class="odd">
                      <td>LBJ</td>                    
                      <td>-0.05%</td>
                      <td>$-4.85</td>                     
                      <td>-0.121%</td>
                      <td>$-12.08</td>                     
                      <td>0.017%</td>
                      <td>$1.49</td>                      
                      <td>0.155%</td>
                      <td>$11.75</td>                     
                      <td>6.617%</td>
                      <td>$76.10</td>
                    </tr><tr role="row" class="even">
                      <td>LMT</td>                    
                      <td>-0.02%</td>
                      <td>$-4.09</td>                     
                      <td>-0.039%</td>
                      <td>$-9.93</td>                     
                      <td>-0.032%</td>
                      <td>$-8.19</td>                      
                      <td>-0.015%</td>
                      <td>$-3.73</td>                     
                      <td>0.142%</td>
                      <td>$30.44</td>
                    </tr><tr role="row" class="odd">
                      <td>ESS</td>                    
                      <td>-0.02%</td>
                      <td>$-3.50</td>                     
                      <td>-0.014%</td>
                      <td>$-3.08</td>                     
                      <td>-0.05%</td>
                      <td>$-11.72</td>                      
                      <td>-0.027%</td>
                      <td>$-6.07</td>                     
                      <td>-0.069%</td>
                      <td>$-16.43</td>
                    </tr><tr role="row" class="even">
                      <td>GME</td>                    
                      <td>-0.11%</td>
                      <td>$-3.42</td>                     
                      <td>-0.102%</td>
                      <td>$-3.26</td>                     
                      <td>-0.072%</td>
                      <td>$-2.23</td>                      
                      <td>0.069%</td>
                      <td>$1.86</td>                     
                      <td>0.063%</td>
                      <td>$1.70</td>
                    </tr><tr role="row" class="odd">
                      <td>BAP</td>                    
                      <td>-0.02%</td>
                      <td>$-3.38</td>                     
                      <td>-0.008%</td>
                      <td>$-1.30</td>                     
                      <td>-0.016%</td>
                      <td>$-2.61</td>                      
                      <td>0.014%</td>
                      <td>$2.18</td>                     
                      <td>0.645%</td>
                      <td>$61.54</td>
                    </tr><tr role="row" class="even">
                      <td>AAP</td>                    
                      <td>-0.02%</td>
                      <td>$-3.35</td>                     
                      <td>-0.013%</td>
                      <td>$-2.14</td>                     
                      <td>-0.073%</td>
                      <td>$-12.43</td>                      
                      <td>-0.033%</td>
                      <td>$-5.33</td>                     
                      <td>0.051%</td>
                      <td>$7.58</td>
                    </tr><tr role="row" class="odd">
                      <td>FMX</td>                    
                      <td>-0.03%</td>
                      <td>$-3.13</td>                     
                      <td>-0.057%</td>
                      <td>$-5.56</td>                     
                      <td>0.037%</td>
                      <td>$3.29</td>                      
                      <td>0.001%</td>
                      <td>$0.13</td>                     
                      <td>0.009%</td>
                      <td>$0.80</td>
                    </tr><tr role="row" class="even">
                      <td>CWEI</td>                    
                      <td>-0.04%</td>
                      <td>$-2.75</td>                     
                      <td>-0.007%</td>
                      <td>$-0.41</td>                     
                      <td>0.672%</td>
                      <td>$25.00</td>                      
                      <td>1.264%</td>
                      <td>$34.74</td>                     
                      <td>1.108%</td>
                      <td>$32.70</td>
                    </tr><tr role="row" class="odd">
                      <td>HEI</td>                    
                      <td>-0.04%</td>
                      <td>$-2.65</td>                     
                      <td>-0.067%</td>
                      <td>$-4.97</td>                     
                      <td>-0.005%</td>
                      <td>$-0.37</td>                      
                      <td>0.031%</td>
                      <td>$2.07</td>                     
                      <td>0.285%</td>
                      <td>$15.31</td>
                    </tr><tr role="row" class="even">
                      <td>FCNCA</td>                    
                      <td>-0.01%</td>
                      <td>$-2.61</td>                     
                      <td>-0.001%</td>
                      <td>$-0.40</td>                     
                      <td>0.064%</td>
                      <td>$16.83</td>                      
                      <td>0.079%</td>
                      <td>$20.28</td>                     
                      <td>0.088%</td>
                      <td>$22.46</td>
                    </tr><tr role="row" class="odd">
                      <td>FIEG</td>                    
                      <td>-0.02%</td>
                      <td>$-2.59</td>                     
                      <td>-0.014%</td>
                      <td>$-1.87</td>                     
                      <td>-0.007%</td>
                      <td>$-0.89</td>                      
                      <td>0.044%</td>
                      <td>$5.54</td>                     
                      <td>0.214%</td>
                      <td>$22.94</td>
                    </tr><tr role="row" class="even">
                      <td>DTE</td>                    
                      <td>-0.03%</td>
                      <td>$-2.57</td>                     
                      <td>-0.024%</td>
                      <td>$-2.31</td>                     
                      <td>-0.049%</td>
                      <td>$-4.79</td>                      
                      <td>-0.071%</td>
                      <td>$-7.05</td>                     
                      <td>0.165%</td>
                      <td>$13.09</td>
                    </tr><tr role="row" class="odd">
                      <td>CBRL</td>                    
                      <td>-0.02%</td>
                      <td>$-2.55</td>                     
                      <td>-0.026%</td>
                      <td>$-4.26</td>                     
                      <td>-0.008%</td>
                      <td>$-1.28</td>                      
                      <td>-0.078%</td>
                      <td>$-13.37</td>                     
                      <td>0.254%</td>
                      <td>$31.84</td>
                    </tr><tr role="row" class="even">
                      <td>IDU</td>                    
                      <td>-0.02%</td>
                      <td>$-2.42</td>                     
                      <td>-0.021%</td>
                      <td>$-2.65</td>                     
                      <td>-0.054%</td>
                      <td>$-6.99</td>                      
                      <td>-0.07%</td>
                      <td>$-9.19</td>                     
                      <td>0.145%</td>
                      <td>$15.53</td>
                    </tr><tr role="row" class="odd">
                      <td>LULU</td>                    
                      <td>-0.03%</td>
                      <td>$-2.40</td>                     
                      <td>-0.03%</td>
                      <td>$-2.43</td>                     
                      <td>0.008%</td>
                      <td>$0.59</td>                      
                      <td>0.058%</td>
                      <td>$4.31</td>                     
                      <td>0.456%</td>
                      <td>$24.48</td>
                    </tr><tr role="row" class="even">
                      <td>BIG</td>                    
                      <td>-0.04%</td>
                      <td>$-2.37</td>                     
                      <td>-0.05%</td>
                      <td>$-2.66</td>                     
                      <td>-0.049%</td>
                      <td>$-2.61</td>                      
                      <td>0.01%</td>
                      <td>$0.49</td>                     
                      <td>0.329%</td>
                      <td>$12.53</td>
                    </tr><tr role="row" class="odd">
                      <td>KOF</td>                    
                      <td>-0.03%</td>
                      <td>$-2.34</td>                     
                      <td>-0.034%</td>
                      <td>$-2.74</td>                     
                      <td>-0.02%</td>
                      <td>$-1.54</td>                      
                      <td>-0.079%</td>
                      <td>$-6.55</td>                     
                      <td>0.096%</td>
                      <td>$6.70</td>
                    </tr><tr role="row" class="even">
                      <td>JBSS</td>                    
                      <td>-0.04%</td>
                      <td>$-2.30</td>                     
                      <td>0.08%</td>
                      <td>$3.66</td>                     
                      <td>0.062%</td>
                      <td>$2.91</td>                      
                      <td>0.16%</td>
                      <td>$6.84</td>                     
                      <td>-0.069%</td>
                      <td>$-3.68</td>
                    </tr><tr role="row" class="odd">
                      <td>ENS</td>                    
                      <td>-0.03%</td>
                      <td>$-2.26</td>                     
                      <td>-0.002%</td>
                      <td>$-0.15</td>                     
                      <td>0.126%</td>
                      <td>$7.81</td>                      
                      <td>0.177%</td>
                      <td>$10.50</td>                     
                      <td>0.27%</td>
                      <td>$14.89</td>
                    </tr><tr role="row" class="even">
                      <td>ANTM</td>                    
                      <td>-0.02%</td>
                      <td>$-2.17</td>                     
                      <td>-0.037%</td>
                      <td>$-4.77</td>                     
                      <td>-0.05%</td>
                      <td>$-6.52</td>                      
                      <td>-0.048%</td>
                      <td>$-6.31</td>                     
                      <td>-0.092%</td>
                      <td>$-12.72</td>
                    </tr><tr role="row" class="odd">
                      <td>IFF</td>                    
                      <td>-0.02%</td>
                      <td>$-2.12</td>                     
                      <td>-0.007%</td>
                      <td>$-0.99</td>                     
                      <td>0.023%</td>
                      <td>$3.07</td>                      
                      <td>0.079%</td>
                      <td>$9.95</td>                     
                      <td>0.153%</td>
                      <td>$18.11</td>
                    </tr><tr role="row" class="even">
                      <td>ATHN</td>                    
                      <td>-0.02%</td>
                      <td>$-2.10</td>                     
                      <td>-0.002%</td>
                      <td>$-0.20</td>                     
                      <td>-0.049%</td>
                      <td>$-6.28</td>                      
                      <td>-0.114%</td>
                      <td>$-15.69</td>                     
                      <td>-0.232%</td>
                      <td>$-36.97</td>
                    </tr><tr role="row" class="odd">
                      <td>AGU</td>                    
                      <td>-0.02%</td>
                      <td>$-2.06</td>                     
                      <td>-0.014%</td>
                      <td>$-1.26</td>                     
                      <td>-0.017%</td>
                      <td>$-1.57</td>                      
                      <td>-0.01%</td>
                      <td>$-0.86</td>                     
                      <td>0.011%</td>
                      <td>$0.94</td>
                    </tr><tr role="row" class="even">
                      <td>IDA</td>                    
                      <td>-0.02%</td>
                      <td>$-1.93</td>                     
                      <td>-0.018%</td>
                      <td>$-1.37</td>                     
                      <td>-0.064%</td>
                      <td>$-5.12</td>                      
                      <td>-0.075%</td>
                      <td>$-6.14</td>                     
                      <td>0.115%</td>
                      <td>$7.77</td>
                    </tr></tbody>
              
<!--                  <tbody>

                    <?php 
                    foreach($priceChange as $row){?>
                    <tr>
                      <td><?=$row->ticker?></td>                    
                      <td><?=round($row->percent_change_day,3)?>%</td>
                       <td>$<?=$row->price_change_day?></td>                     
                      <td><?=round($row->percent_change_week,3)?>%</td>
                      <td>$<?=$row->price_change_week?></td>                     
                      <td><?=round($row->percent_change_month,3)?>%</td>
                      <td>$<?=$row->price_change_month?></td>                      
                      <td><?=round($row->percent_change_quarter,3)?>%</td>
                      <td>$<?=$row->price_change_quarter?></td>                     
                      <td><?=round($row->percent_change_year,3)?>%</td>
                       <td>$<?=$row->price_change_year?></td>
                    </tr>

                    <?php  }?>
                   
                  </tbody>-->
                </table>
              </div><!-- /.panel-body -->
            </div><!-- /.panel -->

          </div><!-- /.col (LEFT) -->

      
  </div>
      </section>
    </div>
</div>


<div class="row-border home-row">
  <section>
    <div class="col-md-30"><hr class="colorgraph"></div>
    <div class="heading-title col-md-20">
      Key Historical Price Points
    </div>
    <div class="col-md-30"><hr class="colorgraph"></div>
  </section>

  <section class="container">
    <div class="row">
      <div class="col-md-80">
        <h2 class="text-center text-bold"><a href="<?=site_url('plan')?>" class="text-primary">7,000+ Stocks And ETFs.  We Have Many Charts, And Will Build At Your request.
            <br>Save Charts Or Create A Portfolio To Follow Your Favorite.START FREE TRIAL NOW  </a></h2>
        <!-- BAR CHART -->
        <div class="panel panel-default">
          <div class="panel-heading with-border">
            <h3 class="panel-title text-center">Price All Time Low To All Time High</h3>
          </div>
          <div class="panel-body">
<!--            <div class="chart">
             <canvas id="barChart" data-x=" All Time Low: $1.91,52Week Low: $3.12,Current Price: $3.54,52Week High: $5.00,All Time High: $5.00" data-y=" 1.91,3.12,3.54,5.00,5.00" data-label="Ticker AAME" ></canvas>
            </div>-->
<div class="chart">
              <canvas id="barChart"  data-x=" <?= implode(",", $historicChart['days']) ?>" data-y=" <?= implode(",", $historicChart['val']) ?>" data-label="Ticker <?= $historicChart['label'] ?>"></canvas>
            </div>
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->

      </div><!-- /.col (RIGHT) -->
    </div><!-- /.row -->
  </section>
</div>


<?php include_once 'footer.php'; ?>