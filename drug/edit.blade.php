{% extends 'layout.html' %} 


{% block title%}
Edit Drug
{% endblock %}

{% block content %}
<div class="row justify-content-center">
   <div class="col-md-8">
      <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Drug</h6>
         </div>
         <div class="card-body">
            {% if error %}
<div class="alert alert-danger">
   <ul>
      <li>{{ error }}</li>
   </ul>
</div>
{% endif %}
{% if success %}
<div class="alert alert-success">
   {{ success }}
</div>
{% endif %}
            <form method="post" action="/drug.store_edit">
               <div class="form-group">
                  <label for="exampleInputEmail1">Trade Name *</label>
                  <input type="text" class="form-control" name="trade_name" id="TradeName" aria-describedby="TradeName" value="{{ $drug->trade_name }}">
                  {{ csrf_field() }}
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Generic Name *</label>
                  <input type="text" class="form-control" name="generic_name" id="GenericName" value="{{ $drug->generic_name }}">
                  <input type="hidden" name="drug_id" value="{{ $drug->id }}">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Note</label>
                  <input type="text" class="form-control" name="note" id="Note">
               </div>
               <button type="submit" class="btn btn-primary">sentence.Save</button>
            </form>
         </div>
      </div>
   </div>
</div>
{% endblock %}