<template>
    <div
        class="flex flex-col bg-gradient-to-r from-indigo-900 to-indigo-800 hover:from-indigo-800 hover:to-indigo-900 h-[17.5rem] w-96 rounded-2xl shadow-md shadow-indigo-800"
    >
        <!-- Card Heading -->
        <div class="p-4">
            <div class="text-white font-light text-2xl">
                Total Finance Worth
            </div>

            <div class="text-3xl text-gray-300 flex flex-col">
                <!-- Currency -->
                <div class="">
                    <span class="text-4xl mt-6">$</span>
                    <span class="text-6xl mt-2">4.20</span>
                    <span class="text-4xl mt-6">K</span>
                </div>
            </div>
        </div>

        <div class="mt-4 w-full">
            <div id="area-chart"></div>
        </div>
    </div>
</template>

<script>
import { initFlowbite } from 'flowbite';
export default {
    mounted() {
        initFlowbite();

        let chart = new window.ApexCharts(
            document.getElementById('area-chart'),
            this.options,
        );
        chart.render();
    },
    data() {
        return {
            options: {
                chart: {
                    height: '100%',
                    maxWidth: '100%',
                    type: 'area',
                    fontFamily: 'Inter, sans-serif',
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: true,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        opacityFrom: 1.55,
                        opacityTo: 0,
                        shade: '#003300',
                        gradientToColors: ['#003399'],
                    },
                },
                dataLabels: {
                    enabled: true,
                },
                stroke: {
                    width: 2,
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: 0,
                    },
                },
                series: [
                    {
                        name: 'New users',
                        data: [8500, 8992, 8199, 8444, 8949, 9000],
                        color: '#1A56DB',
                    },
                ],
                xaxis: {
                    categories: [
                        '01 February',
                        '02 February',
                        '03 February',
                        '04 February',
                        '05 February',
                        '06 February',
                        '07 February',
                    ],
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
            },
        };
    },
};
</script>
