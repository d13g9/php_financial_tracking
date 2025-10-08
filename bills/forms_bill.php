<form method="POST" action="<?php echo "./".$action;?>">  
        <div class="mb-5 width-50">
          <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
          <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required >
            <?php while ($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row["CategoryId"]?>"><?php echo $row["CategoryName"]?></option>
           <?php }?>
         </select>
        </div>
        <div class="mb-5 width-50">
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
          <input type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
        </div>
         <div class="mb-5 width-50">
          <label for="bill_value" class="block mb-2 text-sm font-medium text-gray-900">Value</label>
          <input type="number" step="0.01" id="bill_value" name="bill_value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
        </div>
         <div class="mb-5 width-50">
          <label for="date_of_payment" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
          <input type="date" id="date_of_payment" name="date_of_payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="R$" required min="0.00" step="0.01"/>
        </div>
        <div class="flex items-start mb-5">
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </div>
      </form>