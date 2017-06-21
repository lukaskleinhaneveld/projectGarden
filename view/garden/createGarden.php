<div id="Container">
    <div id="droppableArea">
        <div id="gardenCreation"></div>
        <div id="itemShoppingList">
            <?php
            foreach($stock as $stockItem){
            ?>
                <div id="<?= $stockItem['Id'] ?>" class="draggable" onmouseover="drop()">
                    <img src="<?= $stockItem['ImgURL'] ?>" style="width: 150px; height: 150px; border-radius: 50%; margin-top: 0px;"><br/>
                    <p>Item: <?= $stockItem['Name'] ?></p><br/>
                    <p>Price: <?= $stockItem['Price'] ?></p><br/>

                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div id="summaryArea">
        <div id="totalItemsInGarden">

        </div>
        <div id="costSummary">

        </div>
    </div>
</div>

<!-- Drag and drop script -->
<script type="text/javascript" src="<?= URL ?>/public/js/dragndrop.js"></script>
<!-- Google maps API -->
<!-- <script type="text/javascript" src="<?= URL ?>/public/js/googleMapsAPI.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3N_V7fK1m6ThuebPa_yH2HpWCuIPXNPs&callback=initMap"> -->
