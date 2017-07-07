<div class="row-border home-row">
  <section>
    <div class="col-md-30">
      <hr class="colorgraph">
    </div>
    <div class="heading-title col-md-20"> <?php echo $chart->title?> </div>
    <div class="col-md-30">
      <hr class="colorgraph">
    </div>
  </section>
  <section class="container">
    <div class="row filter-row">
      <div class="filter col-md-80">
        <div class="filter-link pull-left col-lg-3 col-md-3 col-sm-3"><a href="javascript: void(0)" onclick="filterToggle('filter-box');"><span>Filter</span></a></div>
        <div class="filter-box stock-filter-box pull-left col-lg-65 col-md-55 col-sm-45 hidden">
          <form class="form-inline" name="filter-data-form">
            <div class="form-group">
              <select name="sector" id="stockSector" class="form-control sortBy" data-field="stockIndustry" data-con="industry" data-me="sector">
                <option value="">Sector</option>
                <?php foreach ($sectors as $sector) { ?>
                <option value="<?= $sector->sector ?>">
                <?= $sector->sector ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <select name="industry" id="stockIndustry" class="form-control sortBy" data-field="stockPriceGroup" data-con="price_group" data-me="industry">
                <option value="">Industry</option>
                 <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->industry ?>"><?= $cdata->industry ?></option>
                <?php } ?>
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
                <option value="<?= $cdata->company ?>">
                <?= $cdata->company ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <select name="ticker" id="stockTicker" class="form-control sortBy" data-live-search="true" data-live-search-placeholder="Search">
                <option value="">Ticker</option>
                <?php foreach ($companyDataAll as $cdata) { ?>
                <option value="<?= $cdata->ticker ?>">
                <?= $cdata->ticker ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <button type="button" class="btn btn-default btn-sm" onclick="appyFilter(this, 'lineChart');">Apply</button>
            <button type="reset" class="btn btn-default btn-sm" >Clear</button>
          </form>
        </div>
        <div class="col-lg-10 col-md-13 col-sm-15 pull-right form-inline" style="margin-top:-27px;">
          <!--<div class=" form-group">
            <label  >Report Toggle</label>
            <select name="sortBy" id="lineChartFilter" class="form-control lineChartFilter">
              <option value="Daily">Daily</option>
              <option value="Weekly">Weekly</option>
              <option value="Monthly">Monthly</option>
              <option value="Quaterly">Quarterly</option>
              <option value="Yearly">Yearly</option>
            </select>
          </div>-->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-80"> 
        
        <!-- LINE CHART -->
        
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="chart" data-xcolum="<?=$chart->x_axis?>" data-ycolum="<?=$chart->y_axis?>" data-labelcolum="<?=$chart->dataLabel?>" data-charttable="<?=$chart->chartTable?>">
              <!--<div class="col-md-30 pull-right filter-label"><span>Daily</span><span>Weekly</span><span>Monthly</span><span>Quarterly</span><span>Yearly</span></div>-->
              <canvas class="lineChart" id="lineChart<?php echo $chart->id?>" data-id="<?php echo $chart->id?>"  data-x=" <?= implode(",", $chart->data['date']) ?>" data-y=" <?= implode(",", $chart->data['val']) ?>" data-label="Ticker <?=$chart->data['label']?>"></canvas>
            </div>
          </div>
          <!-- /.panel-body -->
          <div class="panel-footer clearfix"> <a id="" href="javascript:void(0);" class="lineChart_save btn btn-sm btn-danger pull-right hidden">Save</a> </div>
        </div>
        <!-- /.panel --> 
        
      </div>
      <!-- /.col (RIGHT) --> 
    </div>
    <!-- /.row --> 
  </section>
</div>