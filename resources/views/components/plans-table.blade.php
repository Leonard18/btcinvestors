@props(['plans' => $plans])

<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Investment Plans</h3>

       <table class="table responsive-table table-striped table-hover">
           <thead class="purple darken-2 white-text">
               <tr>
                   <th data-field="id">#</th>
                   <th data-field="name">Name</th>
                   <th data-field="price">Commission rate</th>
                   <th data-field="price">Payment interval</th>
                   <th data-field="price">Description</th>
               </tr>
           </thead>
           <tbody>
               @forelse ($plans as $plan)
                <tr>
                    <td>{{ $plan->id }}</td>
                    <td>{{ $plan->name }}</td>
                    <td>{{ $plan->percentage }}</td>
                    <td>{{ $plan->interval }}</td>
                    <td>{{ $plan->description }}</td>
                </tr>
               @empty
                <tr>
                    <td colspan="5">There are no plans. Create new one.</td>
                </tr>
               @endforelse
           </tbody>
       </table>

      </div>

</div>
