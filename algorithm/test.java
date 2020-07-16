
public int longestIncreaseSubArrayDP(int[] array) {

    if (array.length < 2) return array.length;

    int[] state = new int[array.length];

    state[0] = 1;

    for (int i = 1; i < state.length; i++) {
        int max = 0;
        for (int j = 0; j < i; j++) {
            if (array[j] < array[i]) {
                if (state[j] > max) max = state[j];
            }
        }
        state[i] = max + 1;
    }

    int result = 0;
    for (int i = 0; i < state.length; i++) {
        if (state[i] > result) result = state[i];
    }

    return result;
}