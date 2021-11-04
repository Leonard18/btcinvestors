<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Transaction History</h3>

       <table class="table responsive-table table-striped table-hover">
           <thead class="blue darken-2 white-text">
               <tr>
                   <th data-field="id">#</th>
                   <th data-field="name">Type</th>
                   <th data-field="price">Description</th>
                   <th data-field="price">Date</th>
                   <th data-field="price">Extras</th>
                   <th data-field="price">Status</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                   <td>1</td>
                   <td>Deposit</td>
                   <td>You funded your Bitcoin wallet</td>
                   <td>23-02-2021</td>
                   <td>cash - online - 200002</td>
                   <td>Success</td>
               </tr>
           </tbody>
       </table>

      </div>

</div>
