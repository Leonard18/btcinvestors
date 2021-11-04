<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Active Investments</h3>

       <table class="table responsive-table table-striped table-hover">
           <thead class="green lighten-1 white-text">
               <tr>
                   <th data-field="id">#</th>
                   <th data-field="name">Plan</th>
                   <th data-field="price">Comm. rate</th>
                   <th data-field="price">Expiring date</th>
                   <th data-field="price">Invested amount</th>
                   <th data-field="price">Return amount</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                   <td>1</td>
                   <td>Bronze</td>
                   <td>31%</td>
                   <td>23-02-2021</td>
                   <td>20000</td>
                   <td>50000</td>
               </tr>
               <tr>
                <td>2</td>
                <td>Silver</td>
                <td>41%</td>
                <td>25-02-2021</td>
                <td>30000</td>
                <td>100000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Gold</td>
                <td>55%</td>
                <td>27-02-2021</td>
                <td>10000</td>
                <td>90000</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Diamond</td>
                <td>71%</td>
                <td>28-02-2021</td>
                <td>20000</td>
                <td>350000</td>
            </tr>
           </tbody>
       </table>

      </div>

</div>
