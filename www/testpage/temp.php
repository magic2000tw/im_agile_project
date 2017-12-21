<?php while ($stmt3->fetch()){?>
    <li>
        <div class="trip-day">
            <a href="#trip-list-comp-collapse"  data-toggle="collapse" aria-expanded="false" aria-controls="day1-spot-list">
                <span class="day-flag" id="day-flag-comp"><?php echo $date ?></>
            </a>
            <div id="<?php echo $date."-collapse" ?>" class="collapse">
                <ul class="trip-list">
                    <?php while ($stmt2->fetch()){?>
                        <li>
                          <div  class="trip-cell">
                              <ul class="trip-list-number" style="float:left;">
                                <li><input class="timepicker" value="<?php echo $start_time ?>"></li>
                                <li><i class="fas fa-map-marker-alt fa-3x"></i></li>
                                <li><input class="timepicker" value="<?php echo $end_time ?>"></li>
                              </ul>
                              <div class="trip-list-title" >
                                  <img class="trip-list-title-img" src="<?php echo $img_url ?>"></img>
                                  <dummy>
                                      <p class="trip-list-title-name"><?php echo $place_name ?></p>
                                      <p class="trip-list-title-addr"><?php echo $place_addr ?></p>
                                  </dummy>
                                  <i class="fas fa-times-circle fa-3x deleteSpot" onclick="deleteSpot(this.parentElement.parentElement)"></i>
                                  <small hidden ><?php echo $place_id ?></small>
                              </div>
                              <ul class="sort-btns">
                                  <li onclick="moveUp(this.parentElement.parentElement.parentElement)"><i class="fas fa-sort-up fa-5x" ></i></li>
                                  <li onclick="moveDown(this.parentElement.parentElement.parentElement)"><i class="fas fa-sort-down fa-5x" ></i></li>
                              </ul>
                          </div>
                        </li>
                    <?php } ?>
                </ul>
                <div class="trip-list-addbtn"><i class="fas fa-plus-square fa-3x">新增旅遊景點</i></div>
            </div>
        </div>
    </li>
<?php } ?>
