# Dynamic Memory Allocation Using Worst-Fit Algorithm

## Assumptions

- **Job Queue**: The jobs and their memory requirements are:
  - J1: 212 KB
  - J2: 417 KB
  - J3: 112 KB
  - J4: 424 KB

- **Free Memory Blocks**: Available memory blocks are:
  - Block 01: 100 KB
  - Block 02: 500 KB
  - Block 03: 200 KB
  - Block 04: 300 KB
  - Block 05: 600 KB

## Implementation

This implementation uses an array data structure to dynamically allocate memory to jobs based on the **Worst-Fit Algorithm**. The allocation decision is made at runtime based on the input fields defining memory blocks and jobs.

### Explanation of Allocation

1. **Allocation of J1 (212 KB)**
   - Search for the largest free block available:
     - Block 02: 500 KB - 212 KB = 288 KB
     - Block 04: 300 KB - 212 KB = 88 KB
     - Block 05: 600 KB - 212 KB = 388 KB
   - **Result**: J1 is allocated to **Block 05**.

2. **Allocation of J2 (417 KB)**
   - Search for the largest free block available:
     - Block 02: 500 KB - 417 KB = 83 KB
   - **Result**: J2 is allocated to **Block 02**.

3. **Allocation of J3 (112 KB)**
   - Search for the largest free block available:
     - Block 03: 200 KB - 112 KB = 88 KB
     - Block 04: 300 KB - 112 KB = 188 KB
     - Block 05: 388 KB - 112 KB = 276 KB
   - **Result**: J3 is allocated to **Block 05**.

4. **Allocation of J4 (424 KB)**
   - Search for the largest free block available:
     - None of the remaining blocks can accommodate 424 KB.
   - **Result**: J4 cannot be allocated due to insufficient memory.

## How It Works

1. **Input Fields**: Define memory blocks and job sizes at runtime.
2. **Algorithm**: The Worst-Fit Algorithm finds the largest available memory block for each job.
3. **Dynamic Allocation**: Memory allocation decisions are made dynamically based on available resources and job sizes.


