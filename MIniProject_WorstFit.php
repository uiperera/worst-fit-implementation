<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worst Fit Memory Allocation</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        .input-section {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        #output {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Worst Fit Memory Allocation</h1>
        <form id="allocationForm">
            <div class="input-section">
                <label for="memoryBlocks">Memory Blocks (comma-separated):</label>
                <input type="text" id="memoryBlocks" required placeholder="e.g., 100, 500...">
            </div>
            <div class="input-section">
                <label for="processSizes">Process Sizes (comma-separated):</label>
                <input type="text" id="processSizes" required placeholder="e.g., 212, 112 ...">
            </div>
            <button type="submit">Allocate Memory</button>
        </form>
        <div id="output">
            <h2>Allocation Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>Process No.</th>
                        <th>Process Size</th>
                        <th>Block No.</th>
                    </tr>
                </thead>
                <tbody id="outputTable">
                   <!-- showing the result  -->
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function allocateWorstFit(memoryBlocks, processSizes) {
            const numBlocks = memoryBlocks.length;
            const numProcesses = processSizes.length;

            // Array to store -1
            const allocatedBlocks = new Array(numProcesses).fill(-1);

            // Iterate through each process to find a memory block
            for (let processIndex = 0; processIndex < numProcesses; processIndex++) {
                let largestBlockIndex = -1; 

                // Find the largest memory block 
                for (let blockIndex = 0; blockIndex < numBlocks; blockIndex++) {
                    if (memoryBlocks[blockIndex] >= processSizes[processIndex]) {
                        if (largestBlockIndex === -1 || memoryBlocks[blockIndex] > memoryBlocks[largestBlockIndex]) {
                            largestBlockIndex = blockIndex;
                        }
                    }
                }

                // If a suitable block is found, allocate it to the process
                if (largestBlockIndex !== -1) {
                    allocatedBlocks[processIndex] = largestBlockIndex + 1; 
                    memoryBlocks[largestBlockIndex] -= processSizes[processIndex]; // Reduce available memory in the block
                }
            }

            return allocatedBlocks;
        }

        document.getElementById("allocationForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const memoryBlocksInput = document.getElementById("memoryBlocks").value.split(",").map(Number);
            const processSizesInput = document.getElementById("processSizes").value.split(",").map(Number);

            const results = allocateWorstFit([...memoryBlocksInput], processSizesInput);

            const outputTable = document.getElementById("outputTable");
            outputTable.innerHTML = "";

            processSizesInput.forEach((size, index) => {
                const row = document.createElement("tr");

                const processCell = document.createElement("td");
                processCell.textContent = index + 1;
                row.appendChild(processCell);

                const sizeCell = document.createElement("td");
                sizeCell.textContent = size;
                row.appendChild(sizeCell);

                const blockCell = document.createElement("td");
                blockCell.textContent = results[index] !== -1 ? results[index] : "Not Allocated";
                row.appendChild(blockCell);

                outputTable.appendChild(row);
            });
        });
    </script>
</body>

</html>
