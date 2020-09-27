<template>
	<div>
		<!--header-->
		<section class="content-header">
			<h3>
        Dashboard
      </h3>
			<ol class="breadcrumb">
				<li>
					<a href="#">
						<i class="fa fa-dashboard"></i> Home
					</a>
				</li>
				<li>
					<a href="#">Dashboard</a>
				</li>
			</ol>
		</section>
		<!--end header-->
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="container-fluid">
					<div class="box">
                        <div class="box-header">
                            Chart
                        </div>
                        <div class="box-body">
                            <b-row>
                                <b-col>
                                   <line-chart></line-chart>
                                </b-col>
                            </b-row>
                            <b-row>
                                <b-col>
                                    <bar-chart></bar-chart>
                                </b-col>
                                <b-col>
                                   <line-chart></line-chart>
                                </b-col>
                            </b-row>
                            <b-row>
                                <b-col>
                                    <bar-chart></bar-chart>
                                </b-col>
                            </b-row>
                            <b-row>
                                <b-col>
                                   <bubble-chart></bubble-chart>
                                </b-col>
                            </b-row>
                        </div>
                    </div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
</template>

<script>
import LineChart from '../dashboard/LineChart'
import BarChart from '../dashboard/BarChart'
import BubbleChart from '../dashboard/BubbleChart'

export default {
    name: 'VueChartJS',
    components: {
      LineChart,
      BarChart,
      BubbleChart,
    }
}

</script>