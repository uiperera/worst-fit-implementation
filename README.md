# Dynamic Memory Allocation Using Worst-Fit Algorithm

## Assumptions

- **Job Queue**: The jobs and their memory requirements are:
  - J1: 315 KB
  - J2: 200 KB
  - J3: 145 KB
  - J4: 520 KB

- **Free Memory Blocks**: Available memory blocks are:
  - Block 01: 150 KB
  - Block 02: 450 KB
  - Block 03: 300 KB
  - Block 04: 600 KB
  - Block 05: 500 KB

## Implementation

This implementation uses an array data structure to dynamically allocate memory to jobs based on the **Worst-Fit Algorithm**. The allocation decision is made at runtime based on the input fields defining memory blocks and jobs.

### Explanation of Allocation

1. **Allocation of J1 (315 KB)**
   - Search for the largest free block available:
     - Block 02: 450 KB - 315 KB = 135 KB
     - Block 03: 300 KB - 315 KB = Not sufficient
     - Block 04: 600 KB - 315 KB = 285 KB
     - Block 05: 500 KB - 315 KB = 185 KB
   - **Result**: J1 is allocated to **Block 04**.

2. **Allocation of J2 (200 KB)**
   - Search for the largest free block available:
     - Block 02: 450 KB - 200 KB = 250 KB
     - Block 05: 500 KB - 200 KB = 300 KB
   - **Result**: J2 is allocated to **Block 05**.

3. **Allocation of J3 (145 KB)**
   - Search for the largest free block available:
     - Block 02: 450 KB - 145 KB = 305 KB
     - Block 01: 150 KB - 145 KB = 5 KB
   - **Result**: J3 is allocated to **Block 02**.

4. **Allocation of J4 (520 KB)**
   - Search for the largest free block available:
     - Block 04: 285 KB - Not sufficient
     - Block 05: 300 KB - Not sufficient
     - Block 02: 305 KB - Not sufficient
     - Block 01: 5 KB - Not sufficient
   - **Result**: J4 cannot be allocated due to insufficient memory.
