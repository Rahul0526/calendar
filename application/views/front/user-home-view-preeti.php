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
    <div class="row filter-row">
      <div class="filter col-md-80">
        <div class="filter-link pull-left col-sm-3"><a href="javascript: void(0)" onclick="filterToggle('filter-box');"><span>Filter</span></a></div>
        <div class="filter-box stock-filter-box pull-left col-sm-65 hidden">
          <form class="form-inline" name="filter-data-form">
            <div class="form-group">
              <select name="sector" id="stockSector" class="form-control sortBy" data-field="stockIndustry" data-con="industry" data-me="sector">
                <option value="">Sector</option>
                <?php foreach ($sectors as $sector) { ?>
                  <option value="<?= $sector->sector ?>"><?= $sector->sector ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">   
              <select name="industry" id="stockIndustry" class="form-control sortBy" data-field="stockPriceGroup" data-con="price_group" data-me="industry">
                <option value="">Industry</option>
              </select>
            </div>
            <div class="form-group">
              <select name="price_group" id="stockPriceGroup" class="form-control sortBy" data-field="stockCompany" data-con="company" data-me="price_group">
                <option value="">Price Group</option>
              </select>
            </div>
            <div class="form-group">
              <select name="company" id="stockCompany" class="form-control sortBy" data-field="stockTicker" data-con="ticker" data-me="company" data-live-search="true" data-live-search-placeholder="Search">
                <option value="">Company</option>
                <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->company ?>"><?= $cdata->company ?></option>
                <?php } ?>
              </select>
            </div>
            
            <div class="form-group">
              <select name="ticker" id="stockTicker" class="form-control sortBy" data-live-search="true" data-live-search-placeholder="Search">
                <option value="">Ticker</option>
                 <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->ticker ?>"><?= $cdata->ticker ?></option>
                <?php } ?>
              </select>
            </div>
            <button type="button" class="btn btn-default btn-sm" onclick="appyFilter(this, 'lineChart');">Apply</button>
            <button type="reset" class="btn btn-default btn-sm" >Clear</button>
          </form>
        </div>
        <div class="col-sm-15 pull-right form-inline">
         
          <div class=" form-group">
            <label  >Report Toggle</label>
            <select name="sortBy" id="lineChartFilter" class="form-control">
              <option value="Daily">Daily</option>
              <option value="Weekly">Weekly</option>
              <option value="Monthly">Monthly</option>
              <option value="Quaterly">Quarterly</option>
              <option value="Yearly">Yearly</option>
            </select>    
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-80">

        <!-- LINE CHART -->

        <div class="panel panel-default">

          <div class="panel-body">

            <div class="chart">
              <canvas id="lineChart"  data-x=" <?= implode(",", $stackChart['date']) ?>" data-y=" <?= implode(",", $stackChart['val']) ?>" data-label="Ticker <?= $stackChart['label'] ?>"></canvas> 
            </div>

          </div><!-- /.panel-body -->
          <div class="panel-footer clearfix">
            <a id="lineChart_save" href="javascript:void(0);" class="btn btn-sm btn-danger pull-right hidden">Save</a>
          </div>
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
    <div class="row filter-row">
      <div class="filter col-md-80">
        <div class="filter-link pull-left col-sm-3"><a href="javascript: void(0)" onclick="filterToggle('filter-box');"><span>Filter</span></a></div>
        <div class="filter-box statics-filter-box pull-left col-sm-65 hidden">
          <form class="form-inline" name="filterDataForm">
            <div class="form-group">
              <select name="sector" id="staticsSector" class="form-control sortBy" data-field="staticsIndustry" data-con="industry" data-me="sector">
                <option value="">Sector</option>
                <?php foreach ($sectors as $sector) { ?>
                  <option value="<?= $sector->sector ?>"><?= $sector->sector ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">   
              <select name="industry" id="staticsIndustry" class="form-control sortBy" data-field="staticsPriceGroup" data-con="price_group" data-me="industry">
                <option value="">Industry</option>
              </select>
            </div>
            <div class="form-group">
              <select name="price_group" id="staticsPriceGroup" class="form-control sortBy" data-field="staticsCompany" data-con="company" data-me="price_group">
                <option value="">Price Group</option>
              </select>
            </div>
            <div class="form-group">
              <select name="company" id="staticsCompany" class="form-control sortBy" data-field="staticsTicker" data-con="ticker" data-me="company" data-live-search="true" data-live-search-placeholder="Search">
                <option value="">Company</option>
                <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->company ?>"><?= $cdata->company ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <select name="ticker" id="staticsTicker" class="form-control sortBy" data-live-search="true" data-live-search-placeholder="Search">
                <option value="">Ticker</option>
                <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->ticker ?>"><?= $cdata->ticker ?></option>
                <?php } ?>
              </select>
            </div>
            <button type="button" class="btn btn-default btn-sm" onclick="appyFilter(this, 'staticsTable');">Apply</button>
            <button type="reset" class="btn btn-default btn-sm" >Clear</button>
          </form>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-80">
        <!-- AREA CHART -->
        <div class="panel ">
          
          <div class="panel-body">
            <table id="staticsTable" class="dataTable2 display table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                <tr>
                  <th>COMPANY</th>
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
                  <th>ADJ CLOSE</th>
                  <th>PRICE GROUP</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($companyData as $row) { ?>
                  <tr>
                    <td><?= $row->company ?></td>
                    <td><?= $row->ticker ?></td>
                    <td><?= $row->sector ?></td>
                    <td><?= $row->industry ?></td>
                    <td><?= $row->market_cap ?></td>
                    <td><?= $row->price_earnings ?></td>
                    <td><?= $row->price_sales ?></td>
                    <td><?= $row->price_book ?></td>
                    <td><?= $row->price_cash ?></td>
                    <td><?= $row->eps ?></td>
                    <td><?= $row->short_ratio ?></td>
                    <td><?= $row->roe ?></td>
                    <td><?= $row->current ?></td>
                    <td><?= $row->quick ?></td>
                    <td><?= $row->debt_equity ?></td>
                    <td><?= $row->gross_m ?></td>
                    <td><?= $row->adj_close ?></td>
                    <td><?= $row->price_group ?></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div><!-- /.panel-body -->
          <div class="panel-footer clearfix">
            <a id="staticsTable_save" href="javascript:void(0);" class="btn btn-sm btn-danger pull-right hidden">Save</a>
          </div>
        </div><!-- /.panel -->
      </div><!-- /.col (LEFT) -->

    </div><!-- /.row -->
  </section>
</div>
<div class="row-border home-row">
  <div class="row-border">
    <div class="col-md-35">
      <section>
        <div class="col-md-20"><hr class="colorgraph"></div>
        <div class="heading-title col-md-40">
          Earnings & Ratings
        </div>
        <div class="col-md-20"><hr class="colorgraph"></div>
      </section>
    </div>
    <div class="col-md-45">
      <section>
        <div class="col-md-20"><hr class="colorgraph"></div>
        <div class="heading-title col-md-40">
          Dollar($) & Percent(%) Changes
        </div>
        <div class="col-md-20"><hr class="colorgraph"></div>
      </section>
    </div>  
  </div>
  <section class="container">
    <div class="row filter-row">
      <div class="filter col-md-80">
        <div class="filter-link pull-left col-sm-3"><a href="javascript: void(0)" onclick="filterToggle('filter-box');"><span>Filter</span></a></div>
        <div class="filter-box price-filter-box pull-left col-sm-65 hidden">
          <form class="form-inline" name="priceFilter">
            <div class="form-group">
              <select name="sector" id="priceSector" class="form-control sortBy" data-field="priceIndustry" data-con="industry" data-me="sector">
                <option value="">Sector</option>
                <?php foreach ($sectors as $sector) { ?>
                  <option value="<?= $sector->sector ?>"><?= $sector->sector ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">   
              <select name="industry" id="priceIndustry" class="form-control sortBy" data-field="pricePriceGroup" data-con="price_group" data-me="industry">
                <option value="">Industry</option>
              </select>
            </div>
            <div class="form-group">
              <select name="price_group" id="pricePriceGroup" class="form-control sortBy" data-field="priceCompany" data-con="company" data-me="price_group">
                <option value="">Price Group</option>
              </select>
            </div>
            <div class="form-group">
              <select name="company" id="priceCompany" class="form-control sortBy" data-field="priceTicker" data-con="ticker" data-me="company" data-live-search="true" data-live-search-placeholder="Search">
                <option value="">Company</option>
                <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->company ?>"><?= $cdata->company ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <select name="ticker" id="priceTicker" class="form-control sortBy" data-live-search="true" data-live-search-placeholder="Search">
                <option value="">Ticker</option>
                <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->ticker ?>"><?= $cdata->ticker ?></option>
                <?php } ?>
              </select>
            </div>
            <button type="button" class="btn btn-default btn-sm " onclick="appyFilter(this, 'priceTable');">Apply</button>
            <button type="reset" class="btn btn-default btn-sm" >Clear</button>
          </form>
        </div>

      </div>
    </div>

    <div class="col-md-35 no-margin no-padding">
      <div class="row-border">

        <div class="col-md-80">
          <!-- AREA CHART -->
          <div class="panel panel-default">

            <div class="panel-body">
              <table class=" dataTable2 display table-bordered" id="earningTable" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th width="50%">Company</th>
                    <th width="20%">Earnings</th>
                    <th width="10%">Target Price</th>
                    <th width="20%">Analyst</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($companyData as $row) { ?>
                    <tr>

                      <td><?= $row->company ?></td>
                      <td><?= $row->earnings ?></td>
                      <td><?= $row->target_price ?></td>
                      <td><?= $row->recommendation ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div><!-- /.panel-body -->
          </div><!-- /.panel -->

        </div><!-- /.col (LEFT) -->

      </div>
    </div>
    <div class="col-md-45 no-margin no-padding">
      <div class="row-border">
        <div class="col-md-80">
          <!-- AREA CHART -->
          <div class="panel panel-default">
            <div class="panel-body">
              <table class=" dataTable2 display table-bordered" id="priceTable" cellspacing="0" width="100%">
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

                  <?php
                  $i = 1;
                  foreach ($priceChange as $row) {
                    ?>
                    <tr>
                      <td><?= $row->ticker ?></td>                    
                      <td><?= round($row->percent_change_day, 3) ?>%</td>
                      <td>$<?= $row->price_change_day ?></td>                     
                      <td><?= round($row->percent_change_week, 3) ?>%</td>
                      <td>$<?= $row->price_change_week ?></td>                     
                      <td><?= round($row->percent_change_month, 3) ?>%</td>
                      <td>$<?= $row->price_change_month ?></td>                      
                      <td><?= round($row->percent_change_quarter, 3) ?>%</td>
                      <td>$<?= $row->price_change_quarter ?></td>                     
                      <td><?= round($row->percent_change_year, 3) ?>%</td>
                      <td>$<?= $row->price_change_year ?></td>
                    </tr>

                    <?php $i++;
                  }
                  ?>

                </tbody>
              </table>
            </div><!-- /.panel-body -->
          </div><!-- /.panel -->

        </div><!-- /.col (LEFT) -->

      </div>
    </div>
    <div class="col-md-80 clearfix">
            <a id="priceTable_save" href="javascript:void(0);" class="btn btn-sm btn-danger pull-right hidden">Save</a>
          </div>
  </section>
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
    <div class="filter-row col-md-80">
      <div class="filter-link pull-left col-sm-3"><a href="javascript: void(0)" onclick="filterToggle('filter-box');"><span>Filter</span></a></div>
      <div class="filter-box history-filter-box pull-left col-sm-65 hidden">
        <form class="form-inline" name="filterForm">
          <div class="form-group">
            <select name="sector" id="historySector" class="form-control sortBy" data-field="historyIndustry" data-con="industry" data-me="sector">
              <option value="">Sector</option>
              <?php foreach ($sectors as $sector) { ?>
                <option value="<?= $sector->sector ?>"><?= $sector->sector ?></option>
<?php } ?>
            </select>
          </div>
          <div class="form-group">   
            <select name="industry" id="historyIndustry" class="form-control sortBy" data-field="historyPriceGroup" data-con="price_group" data-me="industry">
              <option value="">Industry</option>
            </select>
          </div>
          <div class="form-group">
            <select name="price_group" id="historyPriceGroup" class="form-control sortBy" data-field="historyCompany" data-con="company" data-me="price_group">
              <option value="">Price Group</option>
            </select>
          </div>
          <div class="form-group">
            <select name="company" id="historyCompany" class="form-control sortBy" data-field="historyTicker" data-con="ticker" data-me="company" data-live-search="true" data-live-search-placeholder="Search">
              <option value="">Company</option>
              <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->company ?>"><?= $cdata->company ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <select name="ticker" id="historyTicker" class="form-control sortBy" data-live-search="true" data-live-search-placeholder="Search">
              <option value="">Ticker</option>
              <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->ticker ?>"><?= $cdata->ticker ?></option>
                <?php } ?>
            </select>
          </div>
          <button type="button" class="btn btn-default btn-sm" onclick="appyFilter(this, 'barChart');">Apply</button>
          <button type="reset" class="btn btn-default btn-sm" >Clear</button>
        </form>
      </div>

    </div>

    <div class="row">
      <div class="col-md-80">
      
        <div class="panel panel-default">
          <div class="panel-heading with-border">
            <h3 class="panel-title text-center">Price All Time Low To All Time High</h3>
          </div>
          <div class="panel-body">
            <div class="chart">
              <canvas id="barChart"  data-x=" <?= implode(",", $historicChart['days']) ?>" data-y=" <?= implode(",", $historicChart['val']) ?>" data-label="Ticker <?= $historicChart['label'] ?>"></canvas>
            </div>
          </div><!-- /.panel-body -->
          <div class="panel-footer clearfix">
            <a id="barChart_save" href="javascript:void(0);" class="btn btn-sm btn-danger pull-right hidden">Save</a>
          </div>
        </div><!-- /.panel -->

      </div><!-- /.col (RIGHT) -->
    </div><!-- /.row -->
  </section>
</div>


<?php include_once 'footer.php'; ?>