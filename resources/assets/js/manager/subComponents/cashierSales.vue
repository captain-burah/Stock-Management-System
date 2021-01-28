<template>
    <section class="content">
      <div class="container-fluid">
        <!-- Table Row -->
        <div class="row">
          <div class="col-md-12">
            <sales></sales>
          </div>
        </div>
        <!-- /.row (Table Row) -->
      </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
        data() {
            //when ever we use a component or data fetched inside the 
            //TEMPLATE then we declare them inside the return statement
            return {
            //    allSales: {},
            }
        },
        methods: {
           //loadAllSales() {
            //    axios.get("api/sale").then(({data}) => (this.allSales = data.data));
           // },
        },
        //computed: {
            //totalSales() {
            //    var permission = this.allSales;
            //    let sum = 0;
             //   for (let i = 0;i < permission.length; i++ ){
             //       sum = sum + 1;
             //   }
            //    return sum;
        //    }
        //}
    }
</script>
