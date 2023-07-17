const columns = {
  'computer': {
    forward: 7,
    backward: 3
  },
  'mid-computer': {
    forward: 6,
    backward: 3
  },
  'laptop': {
    forward: 4,
    backward: 2
  },
  'medium': {
    forward: 2,
    backward: 2
  },
  'mobile': {
    forward: 1,
    backward: 1
  }
}

const columnsBreakpoints = (width) => (
  width >= 1540
  ? 'computer'
  : (
    1540 > width && width >= 1440
    ? 'mid-computer'
    : (
      1440 > width && width >= 1008
      ? 'laptop'
      : (
        1008 > width && width >= 641
        ? 'medium'
        : (
          641 > width
          ? 'mobile'
          : ''
        )
      )
    )
  )
)

export { columns, columnsBreakpoints }
