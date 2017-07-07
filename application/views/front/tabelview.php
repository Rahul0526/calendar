<div class="row-border home-row">
  <section>
    <div class="col-md-30"><hr class="colorgraph"></div>
    <div class="heading-title col-md-20">
      <?php echo $chart->title?>
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
                 <?php foreach ($companyDataAll as $cdata) { ?>
                  <option value="<?= $cdata->industry ?>"><?= $cdata->industry ?></option>
                <?php } ?>
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
        <div class="panel chart" data-xcolum="<?=$chart->x_axis?>" data-ycolum="<?=$chart->y_axis?>" data-labelcolum="<?=$chart->dataLabel?>" data-charttable="<?=$chart->chartTable?>">
          
          <div class="panel-body">
            <table  class="staticsTable dataTable2 display table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                <?php foreach($chart->data['rawResult'][0] as $key=>$header){?>               
                  <th><?php echo strtoupper($key)?></th>
                <?php }?>
                </tr>              
              </thead>
              <tbody>
                <?php foreach ($chart->data['rawResult'] as $row) { ?>
                  <tr>
                   <?php foreach($chart->data['rawResult'][0] as $key=>$header){?>    
                    <td><?= $row->{$key} ?></td>
                     <?php }?>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div><!-- /.panel-body -->
          <div class="panel-footer clearfix">
            <a id="" href="javascript:void(0);" class="btn btn-sm btn-danger pull-right hidden staticsTable_save">Save</a>
          </div>
        </div><!-- /.panel -->
      </div><!-- /.col (LEFT) -->

    </div><!-- /.row -->
  </section>
</div>
<?php //print_r($chart);