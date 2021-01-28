<template>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3></h3>

                <p>Sales</p>
              </div>
              <div class="icon">
                <ion-icon src="img/svg/bag.svg"></ion-icon>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <ion-icon src="img/svg/stats.svg"></ion-icon>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Customers</p>
              </div>
              <div class="icon">
                <ion-icon src="img/svg/customer.svg"></ion-icon>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
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
