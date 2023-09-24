<!-- Search -->
<form action="">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 left-3">
            <i
                class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
            ></i>
        </div>

        <select class="form-control h-14 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" name="search">
            <option value="approved">Approved requests</option>        
            <option value="rejected">Rejected requests</option>        
            <option value="pending">Pending requests</option>                
            <option value="" disabled selected>Filter Requests</option>        
        </select>

        <div class="absolute top-2 right-2">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
            >
                Filter
            </button>
        </div>
    </div>
</form>