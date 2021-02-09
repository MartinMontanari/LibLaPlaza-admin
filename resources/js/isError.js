export const isError = (status) => {
    const digit = parseInt(status.toString()[0], 10);
    return digit === 4 || digit === 5;
}
