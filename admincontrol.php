 <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Item Name</th>
                      <th>Item Category</th>
                      <th>Quantity</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(isset($_POST['btn_search_category'])){

                          $txt_search_category = $_POST['txt_search_category'];

                          $posts_display = $mysqli->query("SELECT ItemName, Category, Quantity, Date FROM stock_ingredients WHERE Category='$txt_search_category' ORDER BY Id DESC");

                          while($posting = $posts_display->fetch_assoc()){
                            echo '
                                  <form action="" method="POST">
                                    <tr>
                                      <td><input id="readonly" type="text" name="txtSelect" value='. $posting['ItemName'] .' readonly></td>
                                      <td>'. $posting['Category'] .'</td>
                                      <td>'. $posting['Quantity'] .'</td>
                                      <td>'. $posting['Date'] .'</td>
                                      <td><button class="btn btn-info" style="border-radius:0%;" type="submit" name="select">Select</button></td>
                                    </tr>
                                  </form>
                            ';
                          }
                      }
                    ?>
                  </tbody>
                </table>
              </div>   
          </div>  
        </div>
      </div>  
    </div>
  </body>