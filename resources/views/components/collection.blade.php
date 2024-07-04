@props(['diagnosisData' => null])
<div class="flex flex-col p-4 items-center bg-blue-200 text-black rounded-lg border-2 border-white">
    <div class="mb-4">{{ $slot }}</div>
    @if($diagnosisData)
        <div style="width: 100%; max-width: 300px; height: 300px;">
            <canvas id="radarChart"></canvas>
        </div>
        <div id="diagnosisResult" class="mt-4 font-bold"></div>
    @endif
</div>
@if($diagnosisData)
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // PHP変数をJavaScriptに渡す
        var diagnosisData = @json($diagnosisData);
        console.log('Diagnosis Data:', diagnosisData); // デバッグ用

        // データが存在するか確認
        if (!diagnosisData || typeof diagnosisData !== 'object') {
            console.error('Invalid diagnosis data');
            return;
        }

        // レーダーチャートのデータ
        var radarData = {
            labels: ['気虚', '血虚', '気滞', '瘀血', '水滞'],
            datasets: [{
                label: 'Diagnoses Data',
                data: [
                    diagnosisData.kikyo_count || 0,
                    diagnosisData.kekyo_count || 0,
                    diagnosisData.kitai_count || 0,
                    diagnosisData.oketsu_count || 0,
                    diagnosisData.suitai_count || 0
                ],
                backgroundColor: 'rgba(0, 32, 96, 0.2)',
                borderColor: 'rgba(0, 32, 96, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(0, 32, 96, 1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(0, 32, 96, 1)'
            }]
        };

        // レーダーチャートのオプション
        var radarOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                r: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 10
                        }
                    },
                    pointLabels: {
                        font: {
                            size: 12
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        };

        // レーダーチャートの表示
        var ctx = document.getElementById('radarChart');
        if (ctx) {
            var radarChart = new Chart(ctx, {
                type: 'radar',
                data: radarData,
                options: radarOptions
            });
        } else {
            console.error('Canvas element not found');
        }

        // 診断結果を表示する関数
        function showDiagnosisResult() {
            var counts = [
                {name: '気虚', value: diagnosisData.kikyo_count || 0},
                {name: '血虚', value: diagnosisData.kekyo_count || 0},
                {name: '気滞', value: diagnosisData.kitai_count || 0},
                {name: '瘀血', value: diagnosisData.oketsu_count || 0},
                {name: '水滞', value: diagnosisData.suitai_count || 0}
            ];
            var maxCount = counts.reduce((max, count) => count.value > max.value ? count : max);
            
            var resultElement = document.getElementById('diagnosisResult');
            if (resultElement) {
                resultElement.textContent = `${maxCount.name}の傾向があります`;
            } else {
                console.error('Result element not found');
            }
        }

        // 診断結果を表示
        showDiagnosisResult();
    });
    </script>
@endif