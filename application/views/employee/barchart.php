<div class="row-border home-row">
  <section>
    <div class="col-md-30"><hr class="colorgraph"></div>
    <div class="heading-title col-md-20">
     <?php echo $chart->title?>
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
               <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->industry ?>"><?= $cdata->industry ?></option>
                <?php } ?>
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
           <!-- <h3 class="panel-title text-center">Price All Time Low To All Time High</h3>-->
          </div>
          <div class="panel-body">
            <div class="chart" data-xcolum="<?=$chart->x_axis?>" data-ycolum="<?=$chart->y_axis?>" data-labelcolum="<?=$chart->dataLabel?>" data-charttable="<?=$chart->chartTable?>">
            	<canvas class="barChart" id="barChart<?php echo $chart->id?>" data-id="<?php echo $chart->id?>"  data-x="<?= implode(",", $chart->data['date']) ?>" data-y="<?= implode(",", $chart->data['val']) ?>" data-label="Ticker<?=$chart->data['label']?>"></canvas>              
            </div>
          </div><!-- /.panel-body -->
          <div class="panel-footer clearfix">
            <a id="barChart_save" href="javascript:void(0);" class="btn btn-sm btn-danger pull-right hidden barChart_save">Save</a>
          </div>
        </div><!-- /.panel -->

      </div><!-- /.col (RIGHT) -->
    </div><!-- /.row -->
  </section>
</div>