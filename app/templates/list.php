            <ul class="todo-list">
                <li>
                    <input type="text" id="text" placeholder="Add new item">
                    <button onclick="createItem()">➕</button>
                </li>
                <?php foreach($items as $item) { ?>
                    
                <li class="<?php echo ($item["done"]=='1')?'done':'' ?>">
                    <input type="text" value="<?php echo htmlspecialchars($item["task"]); ?>" disabled>
                    <button onclick="toggleItemStatus(<?php echo $item["id"]; ?>)">✅</button>
                    <button onclick="deleteItem(<?php echo $item["id"]; ?>)">✘</button>
                </li><?php } ?>

            </ul>
